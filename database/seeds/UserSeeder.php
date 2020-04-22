<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@wesolvit.ge',
            'role' => 'admin',
            'status' => 2,
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'email' => 'company@wesolvit.ge',
            'role' => 'company',
            'status' => 2,
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'email' => 'inactive@wesolvit.ge',
            'role' => 'company',
            'status' => 1,
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);
    }
}
