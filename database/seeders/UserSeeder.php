<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // User admin
        User::create([
            'name' => 'Admin Masjid',
            'email' => 'admin@masjid.com',
            'password' => Hash::make('password123'), // password default
            'role' => 'admin',
        ]);

        // User umum 1
        User::create([
            'name' => 'Jamaah A',
            'email' => 'jamaahA@masjid.com',
            'password' => Hash::make('password123'),
            'role' => 'umum',
        ]);

        // User umum 2
        User::create([
            'name' => 'Jamaah B',
            'email' => 'jamaahB@masjid.com',
            'password' => Hash::make('password123'),
            'role' => 'umum',
        ]);
    }
}
