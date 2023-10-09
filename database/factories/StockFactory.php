<?php

namespace Database\Factories;

use App\enums\StockStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [];
    }

    public function main(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => StockStatus::Main->value,
            ];
        });
    }

    public function manager(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => StockStatus::Manager->value,
            ];
        });

    }

    public function user(User $user): Factory
    {
        return $this->state(function (array $attributes) use ($user) {
            return [
                'user_id' => $user->id,
            ];

        });
    }
}
