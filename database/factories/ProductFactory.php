<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
               'product_name' => $this->faker->word() . ' ' . $this->faker->randomElement(['Tablet', 'Shoes', 'Book', 'Item']),
            'product_price' => $this->faker->randomFloat(2, 100, 5000), 
        
        ];
    }
}
