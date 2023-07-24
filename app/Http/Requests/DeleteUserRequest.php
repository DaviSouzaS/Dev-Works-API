<?php

namespace App\Http\Requests;

use App\Exceptions\AppError;
use ErrorException;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        try {
            $userId = auth()->user()->id;
            return $userId == $this->route('id');

        } catch (ErrorException $error) {
            throw new AppError('User not found', 404);
        }

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
