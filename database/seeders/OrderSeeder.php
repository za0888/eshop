<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        //create 3 orders with  some products(1 each)
        foreach (range(1, 3) as $i) {

            $orderProducts = $products->random(rand(1, 4));
//take some products, put them in order

                Order::factory()
                    ->hasAttached($orderProducts, ['number_of_product' => 1])
                    ->create();

        }

    }
}
