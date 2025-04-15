<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuarios Admin
        User::create([
            'name' => 'Admin Uno',
            'email' => 'admin1@example.com',
            'password' => Hash::make('admin1234'),
            'usertype' => 'admin',
        ]);

        User::create([
            'name' => 'Admin Dos',
            'email' => 'admin2@example.com',
            'password' => Hash::make('admin1234'),
            'usertype' => 'admin',
        ]);

        // Usuarios Cliente
        User::create([
            'name' => 'Cliente Uno',
            'email' => 'cliente1@example.com',
            'password' => Hash::make('cl13nt3004@'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Cliente Dos',
            'email' => 'cliente2@example.com',
            'password' => Hash::make('cl13nt3004@'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Cliente Tres',
            'email' => 'cliente3@example.com',
            'password' => Hash::make('cl13nt3004@'),
            'usertype' => 'user',
        ]);

        User::create([
            'name' => 'Cliente Cuatro',
            'email' => 'cliente4@example.com',
            'password' => Hash::make('cl13nt3004@'),
            'usertype' => 'user',
        ]);
    }
}
