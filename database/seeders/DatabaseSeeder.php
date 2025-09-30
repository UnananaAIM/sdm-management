<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sdm.id',
            'password' => 'admin12345',
        ]);
        $projectdirector = \App\Models\User::factory()->create([
            'name' => 'Project Director',
            'email' => 'pd@sdm.id',
            'password' => 'pd123456',
        ]);
        $employee = \App\Models\User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@sdm.id',
            'password' => 'employee123',
        ]);


        $admin->assignRole('Admin');
        $projectdirector->assignRole('Project Director');
        $employee->assignRole('Employee');
    }
}
