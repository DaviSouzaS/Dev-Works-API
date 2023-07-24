<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'name' => ['required', 'max:50', 'string'],
            'email' => ['required', 'email', 'max:127', 'string'],
            'password' => ['required', 'min:8', 'max:255', 'string'],
            'description' => ['required', 'string'],
            'is_dev' => ['nullable', 'boolean']
        ];
    }
}
