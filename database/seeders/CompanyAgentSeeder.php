<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;

class CompanyAgentSeeder extends Seeder
{
    public function run()
    {
        $company = Company::create([
            'name' => 'Global Travel Partner',
            'country' => 'Singapore',
            'email' => 'info@gtp.com',
            'credit_limit' => 50000,
        ]);

        Agent::create([
            'company_id' => $company->id,
            'name' => 'John Agent',
            'email' => 'agent@crm.test',
            'password' => Hash::make('password'),
        ]);
    }
}
