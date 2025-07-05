<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SaleService
{
    /**
     * Create a sale and its line items
     *
     * @param array $saleData
     * @param array $itemsData
     * @return Sale
     */
    public function createSale(array $saleData, array $itemsData): Sale
    {
        return DB::transaction(function () use ($saleData, $itemsData) {

            $total = calculateSaleTotal($itemsData);
            $sale = Sale::create([
                'user_id'   => $saleData['user_id'],
                'sale_date' => $saleData['sale_date'],
                'total'     => $total,
            ]);

            foreach ($itemsData as $item) {
                $sale->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity'   => $item['quantity'],
                    'total_price'      => $item['price'],
                ]);
                
            }
            if (!empty($saleData['note'])) {
                $sale->notes()->create([
                    'note' => $saleData['note'],
            ]);
        }

            return $sale;
        });
    }
}
