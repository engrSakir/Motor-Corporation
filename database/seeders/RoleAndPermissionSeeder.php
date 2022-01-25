<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role
        $admin_role = Role::create(['name' => 'admin']);
        $user_role  = Role::create(['name' => 'user']);

        //Permission
        Permission::create(['name' => 'profile'])->assignRole([$admin_role, $user_role]);
        Permission::create(['name' => 'investor'])->assignRole([$admin_role]);
        Permission::create(['name' => 'investment'])->assignRole([$admin_role]);
        Permission::create(['name' => 'investor-contact-person'])->assignRole([$admin_role]);
        Permission::create(['name' => 'settlement'])->assignRole([$admin_role]);
        Permission::create(['name' => 'vendor-info'])->assignRole([$admin_role]);
        Permission::create(['name' => 'car-category'])->assignRole([$admin_role]);
        Permission::create(['name' => 'car'])->assignRole([$admin_role]);
        Permission::create(['name' => 'expense'])->assignRole([$admin_role]);
        Permission::create(['name' => 'expense-category'])->assignRole([$admin_role]);
        Permission::create(['name' => 'car-expense'])->assignRole([$admin_role]);
        Permission::create(['name' => 'purchase-payment'])->assignRole([$admin_role]);
        Permission::create(['name' => 'booking-purpose'])->assignRole([$admin_role]);
        Permission::create(['name' => 'pdf'])->assignRole([$admin_role]);
        Permission::create(['name' => 'delivery-challan'])->assignRole([$admin_role]);
        Permission::create(['name' => 'search-by-category'])->assignRole([$admin_role]);
        Permission::create(['name' => 'payment-method'])->assignRole([$admin_role]);
        Permission::create(['name' => ''])->assignRole([$admin_role]);
        Permission::create(['name' => 'settings'])->assignRole([$admin_role]);
        Permission::create(['name' => 'booking'])->assignRole([$admin_role]);
        Permission::create(['name' => 'user'])->assignRole([$admin_role]);
        Permission::create(['name' => 'pos'])->assignRole([$admin_role]);
        Permission::create(['name' => 'invoice'])->assignRole([$admin_role]);
        Permission::create(['name' => 'customer'])->assignRole([$admin_role]);
        Permission::create(['name' => 'expense-budget'])->assignRole([$admin_role]);
        Permission::create(['name' => 'report'])->assignRole([$admin_role]);
        Permission::create(['name' => 'video'])->assignRole([$admin_role]);
        Permission::create(['name' => 'instagram'])->assignRole([$admin_role]);
        Permission::create(['name' => 'permission-management'])->assignRole([$admin_role]);
    }
}
