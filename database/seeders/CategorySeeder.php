<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::find(3); // l'utilisateur connu
        $categories = [
            ['type' => 'Revenu', 'nom' => 'Salaire', 'description' => 'Rémunération du travail'],
            ['type' => 'Revenu', 'nom' => 'Investissement', 'description' => 'Revenus des placements financiers'],
            ['type' => 'Revenu', 'nom' => 'Cadeau', 'description' => 'Somme reçue en cadeau'],
            ['type' => 'Revenu', 'nom' => 'Remboursement', 'description' => 'Somme remboursée par un tiers'],
            ['type' => 'Revenu', 'nom' => 'Autres revenus', 'description' => 'Revenus divers'],

            ['type' => 'Dépense', 'nom' => 'Alimentation', 'description' => 'Courses, restaurants, etc.'],
            ['type' => 'Dépense', 'nom' => 'Transport', 'description' => 'Bus, taxi, carburant'],
            ['type' => 'Dépense', 'nom' => 'Logement', 'description' => 'Loyer, électricité, eau'],
            ['type' => 'Dépense', 'nom' => 'Santé', 'description' => 'Consultations, médicaments'],
            ['type' => 'Dépense', 'nom' => 'Divertissement', 'description' => 'Cinéma, sorties, loisirs'],
        ];
        foreach ($categories as &$cat) {
            $cat['user_id'] = $user->id;
        }

        foreach ($categories as $cat) {
            $user->categories()->create($cat);
        }
    }
}
