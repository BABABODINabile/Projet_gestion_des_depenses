<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Models\Category;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperationRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id(); // si tu veux lier l'opération à l'utilisateur
        $validated['description'] = $validated['description'] ?? 'Aucune description';
        $revenus = Operation::whereHas('category', function ($query) {$query->where('type', 'Revenu');})->sum('montant');
        $depenses = Operation::whereHas('category', function ($query) {$query->where('type', 'Dépense');})->sum('montant');
        $solde_actuel = $revenus - $depenses;

        // Récupérer le montant de la nouvelle dépense
        if(Category::find($validated['category_id'])->type === 'Dépense'){
            $montant_depense = $request->input('montant');
            // 2. Vérification de la Condition
            if (($solde_actuel - $montant_depense) < 0) {
                // 3. Rejet de la Transaction
                // Pour un Contrôleur/Requête :
                return back()->with(['error' => 'Cette dépense dépasse le solde disponible. Solde actuel : ' . $solde_actuel]);
            }
            else {
                // 4. Acceptation de la Transaction
                // Continuer avec le traitement normal
                Operation::create($validated);
                return redirect()->back()
                    ->with('success', 'Opération ajoutée avec succès')
                    ->with('active_tab', 'operations');
                }
        }
        Operation::create($validated);
        return redirect()->back()
            ->with('success', 'Opération ajoutée avec succès')
            ->with('active_tab', 'operations');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperationRequest $request, Operation $operation)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id(); // si tu veux lier l'opération à l'utilisateur
        $validated['description'] = $validated['description'] ?? 'Aucune description';
        $operation->update($validated);

        return redirect()->back()
            ->with('success', 'Opération modifiée avec succès')
            ->with('active_tab', 'operations');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();
        return redirect()->back()
            ->with('success', 'Opération supprimée avec succès')
            ->with('active_tab', 'operations');
    }
}
