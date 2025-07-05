<?php

if (!function_exists('calculateSaleTotal')) {
    function calculateSaleTotal(array $items): float
    {
        $total = 0;
        foreach ($items as $item) {
            $price = $item['price'] ?? 0;
            $quantity = $item['quantity'] ?? 1;
            $discount = $item['discount'] ?? 0;
            $lineTotal = ($price - $discount) * $quantity;
            $total += $lineTotal;
        }
        return round($total, 2);
    }
}
