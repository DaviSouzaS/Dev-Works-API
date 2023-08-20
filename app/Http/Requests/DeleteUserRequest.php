<?php

namespace App\Http\Requests;

use App\Exceptions\AppError;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {

        $user = auth()->user();

        if (!$user) {
            throw new AppError('User not found', 404);
        }
        
        return $user->id == $this->route('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [];
    }
}
