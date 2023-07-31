<?php

namespace Database\Factories;

use App\enums\PriceStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateStart=now();
        $dateEnd=fake()->dateTimeBetween(now(),now()->addDay(random_int(22,99)));

        return [
            'number'=>fake()->numberBetween(1,9999),
            'status'=>PriceStatus::Active->value,
            'start'=>$dateStart,
            'end'=>$dateEnd,
//            'product_id'=>null,
        ];
    }

    public function product(Product $product): Factory
    {
        return $this->state(
            function (array $attributes) use($product){
            return [
                'product_id' => $product->id,
            ];
        });
    }

    public function archival(): Factory
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'status' => PriceStatus::Archival->value,
                ];
            });
    }
}
