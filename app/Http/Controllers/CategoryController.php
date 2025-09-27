<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        Category::create($validated);

        return redirect()->back()
            ->with('success', 'Catégorie créée avec succès')
            ->with('active_tab', 'categorie'); // Onglet actif
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        return redirect()->back()
            ->with('success', 'Catégorie modifiée avec succès')
            ->with('active_tab', 'categorie'); // Onglet actif
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()
            ->with('success', 'Catégorie supprimée avec succès')
            ->with('active_tab', 'categorie'); // Onglet actif
    }
}
