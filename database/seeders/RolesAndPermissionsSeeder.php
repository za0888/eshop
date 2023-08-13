<?php

namespace Database\Seeders;

use App\enums\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Reset cached roles and permissions
        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();
//
        Permission::create(['name' => 'createOrder']);
        Permission::create(['name' => 'viewOrder']);
        Permission::create(['name' => 'editOrder']);
        Permission::create(['name' => 'deleteOrder']);
//
        $roleCustomer = Role::create(['name' => UserStatus::Customer->value])
            ->givePermissionTo([
                'viewOrder',
            ]);

        $roleManager = Role::create(['name' => UserStatus::Manager->value])
            ->givePermissionTo([
                'createOrder',
                'viewOrder',
                'editOrder',
            ]);

        $roleAdmin=Role::create(['name' => UserStatus::Administrator->value])
            ->givePermissionTo(Permission::all());
    }
}
