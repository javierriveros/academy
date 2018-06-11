<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNote extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->isTeacher();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'note' => 'required|numeric|min:0|max:5',
        ];
    }

    public function messages()
    {
        return [
            'note.required' => 'La nota es obligatoria',
            'note.min' => 'El valor mímimo es cero',
            'note.max' => 'El valor máximo es cinco',
        ];
    }
}
