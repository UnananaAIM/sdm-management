<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // --- BUAT PERMISSIONS ---
        // Modul User
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        // Modul Project
        Permission::create(['name' => 'view project']);
        Permission::create(['name' => 'create project']);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);
        Permission::create(['name' => 'update status project']);

        // Modul Task
        Permission::create(['name' => 'view task']);
        Permission::create(['name' => 'create task']);
        Permission::create(['name' => 'edit task']);
        Permission::create(['name' => 'update status task']);


        // --- BUAT ROLES DAN BERIKAN PERMISSIONS ---

        // Role Employee
        $employeeRole = Role::create(['name' => 'Employee']);
        $employeeRole->givePermissionTo([
            'view project',
            'view task',
            'update status task'
        ]);

        // Role Project Director
        $pdRole = Role::create(['name' => 'Project Director']);
        $pdRole->givePermissionTo([
            'view project',
            'update status project',
            'create task',
            'edit task',
            'view task', // PD juga bisa lihat task
        ]);

        // Role Admin
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin dapat semua izin
    }
}