<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'Sales', 'guard_name' => 'admin']);
        Role::create(['name' => 'Operation', 'guard_name' => 'admin']);
        Role::create(['name' => 'Finance', 'guard_name' => 'admin']);

        Role::create(['name' => 'B2B Agent', 'guard_name' => 'agent']);
        Role::create(['name' => 'Customer', 'guard_name' => 'customer']);

    }
}
