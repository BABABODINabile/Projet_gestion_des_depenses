<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'profession' => 'Administrateur',
            'email' => 'admin@example.com',
            'password' => 'Admin@123', // n'oublie pas de hasher le mot de passe dans un vrai projet
            'isAdmin' => 1,
        ]);
    }
}
