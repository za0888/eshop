<?php

namespace Database\Factories;

use App\enums\ManagerState;
use App\enums\UserStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'region'=>fake()->state,
            'phone'=>fake()->phoneNumber,
            'post_code'=>fake()->postcode,
            'city'=>fake()->city,
            'mail_operator_address'=>fake()->address(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => UserStatus::Administrator->value,
            ];
        });
    }

    public function manager(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => UserStatus::Manager->value,
            ];
        });
    }

    public function customer(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => UserStatus::Customer->value,
            ];
        });
    }

    public function active(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'manager_state' => ManagerState::Active->value,
            ];
        });
    }
}
