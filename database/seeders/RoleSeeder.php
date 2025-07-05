<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $roles = collect([
    //         ['name' => 'Administrator'],
    //         ['name' => 'Staff TU (Tata Usaha)'],
    //         ['name' => 'Supplier'],
    //     ]);

    //     $roles = $roles->map(function ($role) {
    //         $role['guard_name'] = 'web';
    //         $role['created_at'] = now();
    //         $role['updated_at'] = $role['created_at'];

    //         return $role;
    //     });

    //     Role::firstOrCreate($roles->toArray());
    // }

    public function run(): void
    {
        $roles = [
            'Administrator',
            'Staff TU (Tata Usaha)',
            'Supplier',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(
                ['name' => $roleName],
                ['guard_name' => 'web']
            );
        }
    }
}
