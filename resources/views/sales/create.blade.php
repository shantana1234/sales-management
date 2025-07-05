@extends('layouts.app')

@section('content')
<div class="max-w-9xl mx-auto">
  
    <div class="flex items-center justify-between mb-5">
    <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="1.5"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 4.75v14.5m7.25-7.25H4.75" />
        </svg>
        Create New Sale
    </h2>

    <a href="{{ route('sales.index') }}"
       class="inline-flex items-center gap-2 text-sm  bg-red-900 text-gray-100 px-4 py-2 rounded hover:bg-gray-900  transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 19l-7-7 7-7" />
        </svg>
        Go Back
    </a>
</div>

<hr class="border-t border-gray-300 mb-10">

    <div id="success-message" class="hidden mb-4 px-4 py-2 bg-green-100 text-green-800 rounded"></div>
    <div id="error-message" class="hidden mb-4 px-4 py-2 bg-red-100 text-red-800 rounded"></div>

    <form id="sale-form">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- LEFT COLUMN --}}
            <div>
                {{-- Customer --}}
                <div class="mb-6">
                    <label class="block mb-2 font-bold text-gray-900 font-bold  flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-900 font-bold " fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Customer
                    </label>
                    <select name="user_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Sale Date --}}
                <div class="mb-6">
                    <label class="block mb-2 font-bold text-gray-700 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-900 font-bold " fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Sale Date
                    </label>
                    <input type="date" name="sale_date" class="w-full border rounded px-3 py-2" required>
                </div>

                {{-- Sale Note --}}
                <div class="mb-6">
                    <label class="block mb-2 font-bold text-gray-700 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-900 font-bold " fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20h9M12 4h9M4 4h.01M4 9h.01M4 15h.01M4 20h.01" />
                        </svg>
                        Sale Note (optional)
                    </label>
                    <textarea name="note" rows="4" class="w-full border rounded px-3 py-2 bg-gray-50 text-gray-700"></textarea>
                </div>
            </div>

            {{-- RIGHT COLUMN --}}
            <div>
                <label class="block mb-3 font-bold text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-900 font-bold " fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h18M9 3v18M15 3v18" />
                    </svg>
                    Products
                </label>

                <table class="w-full text-sm border border-gray-300 rounded mb-3" id="items-table">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-3 py-2">Product</th>
                            <th class="px-3 py-2">Qty</th>
                            <th class="px-3 py-2">Price</th>
                            <th class="px-3 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="item-row">
                            <td class="px-3 py-2">
                                <select name="items[0][product_id]" class="product-select w-full border rounded px-2 py-1">
                                    <option value="">Select</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->product_price }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-3 py-2">
                                <input type="number" name="items[0][quantity]" class="quantity-input w-full border rounded px-2 py-1" value="1" min="1">
                            </td>
                            <td class="px-3 py-2">
                                <input type="text" name="items[0][price]" class="price-input w-full border rounded px-2 py-1">
                            </td>
                            <td class="px-3 py-2 text-center">
                                <button type="button" class="remove-item text-red-600 hover:underline">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" id="add-item" class="mb-4 bg-blue-100 text-blue-700 px-4 py-1 rounded hover:bg-blue-200 transition">
                    ➕ Add Product
                </button>

                {{-- Total --}}
                <div class="mb-4">
                    <label class="block mb-1 font-bold text-gray-700">Total (Preview)</label>
                    <input type="text" id="preview-total" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                </div>
                 {{-- Submit --}}
                <div class="pt-6">
                    <button type="submit"
                        class="w-full bg-green-900 text-white px-20 py-3 rounded hover:bg-green-700 transition font-bold float-right">
                        ✓ Save
                    </button>
                </div>
            </div>
        </div>

       
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let itemIndex = 1;

$('#add-item').on('click', function () {
    const row = `
    <tr class="item-row">
        <td class="px-3 py-2">
            <select name="items[${itemIndex}][product_id]" class="product-select w-full border rounded px-2 py-1">
                <option value="">Select</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->product_price }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </td>
        <td class="px-3 py-2">
            <input type="number" name="items[${itemIndex}][quantity]" class="quantity-input w-full border rounded px-2 py-1" value="1" min="1">
        </td>
        <td class="px-3 py-2">
            <input type="text" name="items[${itemIndex}][price]" class="price-input w-full border rounded px-2 py-1" >
        </td>
        
        <td class="px-3 py-2 text-center">
            <button type="button" class="remove-item text-red-600 hover:underline">Remove</button>
        </td>
    </tr>
    `;
    $('#items-table tbody').append(row);
    itemIndex++;
});


$(document).on('click', '.remove-item', function () {
    $(this).closest('tr').remove();
    calculateTotal();
});


$(document).on('change', '.product-select', function () {
    const price = $(this).find('option:selected').data('price') || 0;
    $(this).closest('tr').find('.price-input').val(price);
    calculateTotal();
});

$(document).on('input', '.quantity-input, .price-input, [name^="items"][name$="[discount]"]', function () {
    calculateTotal();
});

// Calculate total
function calculateTotal() {
    let total = 0;
    $('#items-table tbody tr').each(function () {
        const price = parseFloat($(this).find('.price-input').val()) || 0;
        const quantity = parseInt($(this).find('.quantity-input').val()) || 1;
        const discount = parseFloat($(this).find('input[name$="[discount]"]').val()) || 0;

        total += (price - discount) * quantity;
    });
    $('#preview-total').val(total.toFixed(2));
}

$('#sale-form').on('submit', function (e) {
    e.preventDefault();
    console.log($(this));
    $.ajax({
        // console.log($(this))
        url: '{{ route('sales.store') }}',
        method: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            $('#success-message').text(response.message).removeClass('hidden');
            $('#error-message').addClass('hidden');
            $('#sale-form')[0].reset();
            $('#items-table tbody').html(''); 
            $('#add-item').click(); 
            $('#preview-total').val('');
        },
        error: function (xhr) {
            let msg = xhr.responseJSON?.message || xhr.responseJSON?.error || 'Something went wrong.';
            $('#error-message').text(msg).removeClass('hidden');
            $('#success-message').addClass('hidden');
        }
    });
});
</script>
@endpush
