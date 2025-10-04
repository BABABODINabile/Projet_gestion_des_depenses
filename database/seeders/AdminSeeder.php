<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'nom' => 'Admin',
                'prenom' => 'Principal',
                'image' => 'photo/default.png',
                'profession' => 'Administrateur',
                'password' =>'Admin@123', // Le mot de passe sera hashé automatiquement par un mutateur dans le modèle User
                'isAdmin' => 1,
                'isBlocked' => 0,
            ]
        );
    }
}
