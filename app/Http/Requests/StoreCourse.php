<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->type === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'name' => [
                'required',
                'min:2',
                Rule::unique('courses'),
            ],
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required|min:6',
            'validation' => [
                'required',
                Rule::in(['El conejo brinca']),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener por lo menos 2 letras',
            'name.unique' => 'Un curso con ese nombre ya ha sido registrado',
            'picture.image' => 'El archivo adjuntado no se reconoce como imágen',
            'description.required' => 'La descripción del curso es obligatoria',
            'description.min' => 'El curso necesita más información',
        ];
    }
}
