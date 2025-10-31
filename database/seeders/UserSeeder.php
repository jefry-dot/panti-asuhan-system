<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@panti.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Pengguna biasa
        User::create([
            'name' => 'Pengguna Biasa',
            'email' => 'user@panti.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
