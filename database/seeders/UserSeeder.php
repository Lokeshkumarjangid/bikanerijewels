<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '9999999999',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 1,
        ]);
    }
}
