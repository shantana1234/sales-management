<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    /**
     * Authorize the request.
     *
     * Must return true to allow the request.
     */
    public function authorize(): bool
    {
        return true; // <- ✅ REQUIRED to avoid "This action is unauthorized."
    }

    /**
     * Get validation rules for creating a sale.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'sale_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Custom messages (optional).
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'Please select a customer.',
            'sale_date.required' => 'Please enter a sale date.',
            'items.required' => 'At least one product is required.',
            'items.*.product_id.required' => 'Please select a product.',
            'items.*.quantity.min' => 'Quantity must be at least 1.',
            'items.*.price.min' => 'Price cannot be negative.',
        ];
    }
}
