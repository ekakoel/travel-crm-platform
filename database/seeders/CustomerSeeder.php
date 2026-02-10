<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'Michael Tourist',
            'email' => 'customer@test.com',
            'phone' => '+628123456789',
            'country' => 'Australia',
        ]);
    }
}
