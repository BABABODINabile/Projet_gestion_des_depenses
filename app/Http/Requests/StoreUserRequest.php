<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
     protected $errorBag = 'register';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nom'=>'required|string|max:255',
            'prenom'=>'required|string|max:255',
            'image'=>'image|max:2000',
            'profession'=>'string',
            'email'=>'required|unique:users,email|max:255|email',
            'password'=>'required|string|min:8|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/|confirmed', // Vérifie aussi password_confirmation
        ];
    }
     public function messages(): array
    {
        return [
            'password.regex' => 'Le mot de passe doit contenir au moins : une majuscule, une minuscule, un chiffre et un caractère spécial.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
        ];
    }
}
