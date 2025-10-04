<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Operation;
use Illuminate\Support\Str;
class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::find(1); // utilisateur connu
        $categories = Category::where('user_id', $user->id)->get(); // récupérer toutes les catégories

        for ($i = 0; $i < 50; $i++) {
            $categorie = $categories->random();

            Operation::create([
                'user_id'       => $user->id,
                'category_id'  => $categorie->id,
                'description'   => $categorie->nom . ' - ' . Str::random(5),
                'montant'       => $categorie->type === 'revenu'
                                    ? rand(5000, 200000) / 100   // revenu entre 50 et 2000 €
                                    : rand(100, 100000) / 100,   // dépense entre 1 et 1000 €
            ]);
        }
    }
}
