<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create permissions
        Permission::create(['name' => 'create news']);
        Permission::create(['name' => 'read news']);
        Permission::create(['name' => 'update news']);
        Permission::create(['name' => 'delete news']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['create news', 'read news', 'update news', 'delete news']);
        $userRole->givePermissionTo('read news');
    }
}
