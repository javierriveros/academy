<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && (
            auth()->user()->id == $this->route('user') ||
            auth()->user()->isAdmin()
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required',
            'new_password' => 'confirmed',
            'name' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'current_password.required' => 'La contraseña actual es requerida',
            'new_password.confirmed' => 'Las contraseñas no coinciden',
            'picture.image' => 'El archivo adjuntado no se reconoce como imágen',
        ];
    }
}
