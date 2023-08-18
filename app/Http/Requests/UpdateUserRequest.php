<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        
        $userId = auth()->user()->id;
        return $userId == $this->route('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'name' => ['nullable', 'max:50', 'string'],
            'email' => ['nullable', 'email', 'max:127', 'string'],
            'password' => ['nullable', 'min:8', 'max:255', 'string'],
            'description' => ['nullable', 'string'],
            'is_dev' => ['nullable', 'boolean'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'portfolio' => ['nullable', 'string', 'max:255']
        ];
    }
}
