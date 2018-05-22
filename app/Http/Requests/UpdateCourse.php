<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $course_id = $this->route()->parameter('courses');

        return [
            'name' => [
                'required',
                'min:2',
                'unique:courses,id'.$course_id
            ],
            'description' => 'required|min:6',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'validation' => [
                'required',
                Rule::in(['El conejo brinca']),
            ],
        ];
    }
}
