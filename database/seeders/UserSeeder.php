<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@crm.test',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('Super Admin');

        $sales = User::create([
            'name' => 'Sales User',
            'email' => 'sales@crm.test',
            'password' => Hash::make('password'),
        ]);
        $sales->assignRole('Sales');

        $operation = User::create([
            'name' => 'Operation User',
            'email' => 'ops@crm.test',
            'password' => Hash::make('password'),
        ]);
        $operation->assignRole('Operation');

        $finance = User::create([
            'name' => 'Finance User',
            'email' => 'finance@crm.test',
            'password' => Hash::make('password'),
        ]);
        $finance->assignRole('Finance');
    }
}
