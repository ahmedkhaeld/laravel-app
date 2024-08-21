<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubjectRequest extends FormRequest
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
                Rule::unique('subjects', 'name'),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'subject name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'A subject with this name already exists.',
        ];
    }
}
