<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    protected $errorBag = 'updatecategorie';
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
            'type'=>'required|string|max:255',
            'nom'=>'required|string|max:255',
            'description'=>'nullable|string |max:500',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            redirect()->back()
                ->withErrors($validator,$this->errorBag)
                ->withInput()
                ->with('active_tab', 'categorie')
        );
    }
}
