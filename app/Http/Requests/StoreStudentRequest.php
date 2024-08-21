<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
                Rule::unique('students', 'email'),
            ],
            'class_room_id' => 'required|exists:class_rooms,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'student name',
            'email' => 'student email',
            'class_room_id' => 'class room',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'A student with this email already exists.',
        ];
    }
}
