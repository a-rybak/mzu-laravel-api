<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => ucfirst(fake()->unique()->word()),
            'quantity' => fake()->numberBetween(0, 100),
            'price' => fake()->randomFloat(2, 10, 1000),
            'purchased_at' => fake()->dateTimeBetween('-2 months'),
        ];
    }
}
