<?php

namespace Database\Seeders;

use App\enums\UserStatus;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=User::where('status',UserStatus::Manager)->get();

        foreach ($users as $user) {
            Stock::factory()
                ->user($user)
                ->manager()
                ->create();
        }
    }
}
