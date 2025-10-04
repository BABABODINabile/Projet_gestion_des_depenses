<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Operation;

class AuthController extends Controller
{
    //
    public function doLogin(LoginRequest $request){
        $credentiel=$request->validated();
        if (Auth::attempt($credentiel)) {
            session()->regenerate();
            return redirect()->intended(route('index'))->with('success', 'Bienvenu !');
        }
        return to_route('inscription')->with('error', 'Utilisateur non retrouvé !')->onlyInput('email');
        
    }
    public function index(){
       $user = Auth::user()->load('categories');
       $operations = Operation::with('category')->where('user_id', $user->id)->get();
       //dd($operations);
       if($user->isAdmin==0){
        return view('pageUtilisateur.index',compact('user','operations'));
       }
       else if($user->isAdmin==1){
        return view('adminDashboard.index',compact('user','operations'));
       }
    
    }
    public function profil(){
       return view('pageUtilisateur.profil');
        
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnexion

        $request->session()->invalidate(); // Invalide la session
        $request->session()->regenerateToken(); // Nouveau token CSRF
        return redirect()->route('inscription')->with('success', 'Vous êtes déconnecté.');
    }
    


}
