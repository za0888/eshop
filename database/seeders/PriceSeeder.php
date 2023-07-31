<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        if (!$products) {
            return;
        }

        foreach ($products as $product) {
            Price::factory()
                ->for($product)
                ->create();


            if (rand(0,1)) {
                Price::factory()
                    ->for($product)
                    ->archiv()
                ->create();
            }
        }
    }
}
