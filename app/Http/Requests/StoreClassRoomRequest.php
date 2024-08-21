<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClassRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('class_rooms', 'name'),
            ],
            'school_id' => 'required|exists:schools,id',
            'teacher_id' => 'nullable|exists:teachers,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'class room name',
            'school_id' => 'school',
            'teacher_id' => 'teacher',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'A class room with this name already exists.',
        ];
    }
}
