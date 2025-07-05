<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $user = User::take(3)->get();

    //     $user[0]->assignRole('Administrator');
    //     $user[1]->assignRole('Staff TU (Tata Usaha)');
    //     $user[2]->assignRole('Supplier');
    // }

    public function run(): void
    {
        $users = User::take(3)->get();

        $roles = [
            'Administrator',
            'Staff TU (Tata Usaha)',
            'Supplier',
        ];

        foreach ($users as $index => $user) {
            if (isset($roles[$index])) {
                $user->assignRole($roles[$index]);
            }
        }
    }
}
