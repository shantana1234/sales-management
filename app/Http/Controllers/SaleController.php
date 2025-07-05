<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use App\Services\SaleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index(Request $request)
    {
        $sales = Sale::with(['user', 'items.product','notes'])
            ->when($request->customer, function ($query) use ($request) {
                $query->whereHas('user', fn($q) =>
                    $q->where('name', 'like', '%' . $request->customer . '%')
                );
            })
            ->when($request->product, function ($query) use ($request) {
                $query->whereHas('items.product', fn($q) =>
                    $q->where('product_name', 'like', '%' . $request->product . '%')
                );
            })
            ->when($request->from && $request->to, function ($query) use ($request) {
                $query->whereBetween('sale_date', [$request->from, $request->to]);
            })
            ->orderByDesc('sale_date')
            ->paginate(4);

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::all();
        $products = Product::all();

        return view('sales.create', compact('customers', 'products'));
    }

    public function store(StoreSaleRequest $request)
    {
        try {
            // dd($request->all());
            $this->saleService->createSale(
                saleData: [
                    'user_id'   => $request->user_id,
                    'sale_date' => $request->sale_date,
                    'note'      => $request->note,
                ],
                itemsData: $request->items
            );
            

            return response()->json(['message' => 'Sale created successfully!'], 201);

        } catch (\Exception $e) {
            Log::error('Sale creation failed: ' . $e->getMessage());

            return response()->json([
                'error' => 'Sale creation failed',
                'details' => config('app.debug') ? $e->getMessage() : 'Something went wrong'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted.');
    }


    public function trash()
    {
        $sales = Sale::onlyTrashed()->with('user')->paginate(3);

        return view('sales.trash', compact('sales'));
    }

    public function restore($id)
    {
        $sale = Sale::onlyTrashed()->findOrFail($id);
        $sale->restore();

        return redirect()->route('sales.trash')->with('success', 'Sale restored.');
    }

    public function forceDelete($id)
    {
        $sale = Sale::onlyTrashed()->with('items')->findOrFail($id);
        $sale->items()->forceDelete();
        $sale->notes()->delete();
        $sale->forceDelete();
        return redirect()->route('sales.trash')->with('success', 'Sale permanently deleted.');
    }

}
