<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Create roles
                $admin = Role::create(['name' => 'admin']);
                $editor = Role::create(['name' => 'editor']);
        
                // Create permissions
                Permission::create(['name' => 'view dashboard']);
                Permission::create(['name' => 'edit articles']);
        
                // Assign permissions to roles
                $admin->givePermissionTo(['view dashboard', 'edit articles']);
                $editor->givePermissionTo(['view dashboard']);
    }
}
