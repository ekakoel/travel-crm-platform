<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // CRM
            'view crm', 'manage crm',

            // Quotation
            'view quotation', 'create quotation', 'approve quotation',

            // Booking
            'view booking', 'manage booking',

            // Finance
            'view invoice', 'manage payment',

            // Product
            'manage product',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'Super Admin' => $permissions,

            'Sales' => [
                'view crm', 'manage crm',
                'view quotation', 'create quotation',
            ],

            'Operation' => [
                'view booking', 'manage booking',
            ],

            'Finance' => [
                'view invoice', 'manage payment',
            ],

            'Agent' => [
                'view quotation', 'create quotation',
                'view booking',
            ],
        ];

        foreach ($roles as $role => $perms) {
            $r = Role::firstOrCreate(['name' => $role]);
            $r->syncPermissions($perms);
        }
    }
}

