<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $user = auth()->user();
        $operations = Operation::with('category')
        ->where('user_id', $user->id)
        ->get();
        return view('pageUtilisateur.index', compact('operations', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('inscription.inscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        $valide=$request->validated();
        $image=$request->validated('image');
        if ($request->hasFile('image')) {
            $valide['image']=$image->store('photo','public');
            $user=User::create($valide);
        }
        else{
            $user=User::create($valide);
        }
        // Connexion automatique
        Auth::login($user);
        session()->regenerate();
        return redirect()->intended(route('index'))->with('success', 'Bienvenu !');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
