<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        create 3 users : admin manager customer
        User::factory()->admin()->create();
        User::factory()->customer()->create();
        User::factory()
            ->count(3)
            ->active()
            ->manager()
            ->create();
    }
}
