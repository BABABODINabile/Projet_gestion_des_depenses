<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    protected $errorBag = 'updateuser';
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
            'email'=>'required|unique:users,email->ignore($this->user)|max:255|email',
            'password'=>'required|string|min:8|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/',
            'new_password'=>'required|string|min:8|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/',
            'image' => ['sometimes', 'image', 'max:2048', 'mimes:jpg,jpeg,png']
        ];
    }
     public function messages(): array
    {
        return [
            'password.regex' => 'Le mot de passe doit contenir au moins : une majuscule, une minuscule, un chiffre et un caractère spécial.',
            'new_password.regex' => 'Le mot de passe doit contenir au moins : une majuscule, une minuscule, un chiffre et un caractère spécial.',
            'new_password.required' => 'Le champ nouveau mot de passe est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
        ];
    }
}
