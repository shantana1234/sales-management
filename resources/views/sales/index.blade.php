@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold text-gray-800">📋 Sales List</h2>

    <a href="{{ route('sales.trash') }}"
       class="inline-flex items-center gap-2 border bg-yellow-600 text-white text-sm px-5 py-2 rounded hover:bg-gray-100  hover:bg-gray-700 transition">
         {{-- Trash Icon --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m5-4v4" />
    </svg> View Trash
    </a>
</div>
<hr class="border-t border-gray-300 mb-10">
    {{-- Flash Message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filters --}}
    <form method="GET" action="{{ route('sales.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
        <input type="text" name="customer" value="{{ request('customer') }}" placeholder="Customer name"
            class="border rounded px-3 py-2 w-full" />

        <input type="text" name="product" value="{{ request('product') }}" placeholder="Product name"
            class="border rounded px-3 py-2 w-full" />

        <input type="date" name="from" value="{{ request('from') }}"
            class="border rounded px-3 py-2 w-full" />

        <input type="date" name="to" value="{{ request('to') }}"
            class="border rounded px-3 py-2 w-full" />

        <div class="flex space-x-2">
    {{-- Filter Button --}}
{{-- Filter Button --}}
<button type="submit"
    class="flex items-center gap-2 border border-yellow-500 text-yellow-600 px-9 py-2 rounded hover:bg-yellow-50 hover:text-yellow-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600 group-hover:text-yellow-700" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
    </svg>
    Filter
</button>

{{-- Reset Button --}}
<a href="{{ route('sales.index') }}"
    class="flex items-center gap-2 border border-green-500 text-green-600 px-7 py-2 rounded hover:bg-green-50 hover:text-green-700 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600 group-hover:text-green-700" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M4 4v5h.582m15.356 2A8 8 0 114.582 9m0 0L9 14" />
    </svg>
    Reset
</a>

</div>

    </form>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg ">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-left text-sm font-semibold">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Items</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Notes</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($sales as $sale)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $loop->iteration + ($sales->currentPage() - 1) * $sales->perPage() }}</td>
                        <td class="px-4 py-3">{{ $sale->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $sale->sale_date}}</td>
                        <td class="px-4 py-3">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($sale->items as $item)
                                    <li>
                                        {{ $item->product->product_name ?? 'Deleted Product' }} —
                                        Qty: {{ $item->quantity }},
                                        Price: {{ number_format($item->product->product_price, 2) }},
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-4 py-3 font-semibold">{{ $sale->formatted_total }}</td>
                        <td class="px-4 py-3">
                            @if($sale->notes->isNotEmpty())
                                <ul class="list-disc list-inside text-gray-700">
                                    @foreach($sale->notes as $note)
                                        <li>{{ $note->note }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em class="text-gray-400">No notes</em>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            {{-- <form method="POST" action="{{ route('sales.destroy', $sale->id) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit"
                                        class="flex items-center gap-2 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm transition">
                                        
                                        {{-- Cross (X) Icon --}}
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>

                                        Delete
                                </button> --}}

                            {{--</form> --}}
                            <form method="POST" action="{{ route('sales.destroy', $sale->id) }}" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="button"
        class="flex items-center gap-2 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm transition open-delete-modal">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12" />
        </svg>
        Delete
    </button>
</form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No sales found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 mb-20">
        {{ $sales->withQueryString()->links('pagination::tailwind') }}
    </div>

<!-- Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 text-center">
        <h2 class="text-lg font-bold text-gray-800 mb-3">Are you sure?</h2>
        <p class="text-sm text-gray-600 mb-6">You can restore if from the trash! </p>
        <div class="flex justify-center gap-4">
            <button id="cancel-delete"
                class="px-4 py-2 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                Cancel
            </button>
            <button id="confirm-delete"
                class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">
                Yes, Delete
            </button>
        </div>
    </div>
</div>
@push('scripts')
<script>
    let targetForm = null;

    document.querySelectorAll('.open-delete-modal').forEach(button => {
        button.addEventListener('click', function (e) {
            targetForm = button.closest('form');
            document.getElementById('delete-modal').classList.remove('hidden');
        });
    });

    document.getElementById('cancel-delete').addEventListener('click', function () {
        document.getElementById('delete-modal').classList.add('hidden');
        targetForm = null;
    });

    document.getElementById('confirm-delete').addEventListener('click', function () {
        if (targetForm) {
            targetForm.submit();
        }
    });
</script>
@endpush


@endsection
