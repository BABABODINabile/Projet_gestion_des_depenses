<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $validate=$request->validated();
        $user = Auth::user(); 
        //dd($user->password);
        if (!Hash::check($validate['password'],$user->password)) {
            return redirect()->back()->with('error', 'Ancien mot de passe non conforme!');
        }
        $user->nom = $request['nom'];
        $user->prenom = $request['prenom'];
        $user->profession = $request['profession'];
        $user->email = $request['email'];
        $user->password =Hash::make($request['new_password']);
        /**@var UploadedFile|null $image */
        $image=$request->validated('image');
        
        if ($request->hasFile('image')) {
            // Supprimer l’ancienne image
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        $validated['image']=$image->store('photo','public');
        }
        $user->image = $validated['image'] ?? $user->image;
        $user->save();
        //dd($user);
        return redirect()->back()
            ->with('success', 'Utilisateur modifiée avec succès')
            ->with('active_tab', 'profil');
    }
    public function blockUser(User $user)
    {
        $user->isBlocked = true;
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur bloqué avec succès.');
    }

    public function unblockUser(User $user)
    {
        $user->isBlocked = false;
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur débloqué avec succès.');
    }
     /*Remove the specified resource from storage.
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


}
