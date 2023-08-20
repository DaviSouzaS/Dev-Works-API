<?php

namespace App\Http\Requests;

use App\Exceptions\AppError;
use App\Models\Comment_Project_User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        
        $commentId = $this->route('id');

        $comment = Comment_Project_User::find($commentId);

        if (!$comment) {
            throw new AppError('Comment not found', 404);
        }

        $userId = auth()->user()->id;

        return $comment->user_id == $userId;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'comment' => ['required', 'string'],
        ];
    }
}
