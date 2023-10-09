<?php

namespace Database\Seeders;

use App\enums\UserStatus;
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
        $userAdmin = User::factory()->admin()->create();

        $userCustomer = User::factory()->customer()->create();

        $userManager = User::factory()
            ->count(3)
            ->active()
            ->manager()
            ->create();

        $userBoss = User::factory()
            ->count(1)
            ->active()
            ->boss()
            ->create();

//        users roles
        $users = User::all();

        foreach ($users as $user) {

            switch ($user->status) {

                case(UserStatus::Customer):
                    $user->assignRole(UserStatus::Customer->value);
                    break;

                case(UserStatus::Manager):
                    $user->assignRole(UserStatus::Manager->value);
                    break;

                case(UserStatus::Administrator):
                    $user->assignRole(UserStatus::Administrator->value);
                    break;

                case(UserStatus::Boss):
                    $user->assignRole(UserStatus::Boss->value);
                    break;
            }
        }

    }
}
