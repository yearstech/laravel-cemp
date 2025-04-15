<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user and assign role
        $user = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'admin.demo@yearstech.com',
                'password' => Hash::make('12345'),
            ]
        );
        // assign role to user
        $user->assignRole('super-admin');
    }
}
