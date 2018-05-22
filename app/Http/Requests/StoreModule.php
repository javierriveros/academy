<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreModule extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return auth()->check() && auth()->user()->rol->id === 1;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'title' => [
                'required',
                'min:2'
            ],
            'description' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El título debe tener por lo menos 2 letras',
            'description.required' => 'La descripción del módulo es obligatoria',
            'description.min' => 'El módulo necesita más información',
        ];
    }
}
