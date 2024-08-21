<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('teachers', 'email')->ignore($this->route('teacher')),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'teacher name',
            'email' => 'teacher email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'A teacher with this email already exists.',
        ];
    }
}
