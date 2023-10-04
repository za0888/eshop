<?php

namespace Database\Seeders;

use App\enums\StockStatus;
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
//        manager stocks
        $users = User::where('status', UserStatus::Manager)->get();
        if ($users) {
            foreach ($users as $user) {
                Stock::factory()
                    ->user($user)
                    ->manager()
                    ->create();
            }
        }


//        main stock
        Stock::createOrFirst(
            [
                'name'=>'TRUDA16',
                'status'=>StockStatus::Main->value
            ]);
//
       Stock::createOrFirst(
           [
               'name'=>'Kalinova',
               'status'=>StockStatus::Main->value
               ]);

       Stock::createOrFirst(
           [
               'name'=>'Kamenskoe',
               'status'=>StockStatus::Main->value
               ]);
        Stock::createOrFirst(
            [
                'name'=>'Order',
                'status'=>StockStatus::Order->value
            ]);
    }
}
