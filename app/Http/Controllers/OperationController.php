<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
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
