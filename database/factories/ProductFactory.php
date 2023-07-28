<?php

namespace Database\Factories;

use App\enums\StockStatus;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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
//        only for main stock


        return [
            'name'=>fake()->word,

            'number_in_stock'=>10,

            'properties'=>[
                'width'=>rand(1,99),
                'color'=>fake()->colorName
            ],

            'stock_id' => Stock::where('status', StockStatus::Main)->first(),
        ];
    }
}
