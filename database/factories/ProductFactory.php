<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->text,
            'sku' => $this->faker->uuid,
            'status' => $this->faker->randomElement([
                'active',
                'draft',
                'review',
            ]),
            'track_quantity' => $this->faker->boolean,
            'quantity' => $this->faker->numberBetween(0, 100),
            'sell_out_of_stock' => $this->faker->boolean,
            'category_id' => Category::factory(),
        ];
    }
}
