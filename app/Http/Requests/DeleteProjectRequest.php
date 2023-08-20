<?php

namespace App\Http\Requests;

use App\Exceptions\AppError;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class DeleteProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
       
        $userIsDev = auth()->user()->is_dev;

        if (!$userIsDev) {
            return false;
        }

        $projectId = $this->route('id');
        $userId =  auth()->user()->id;

        $project = Project::find($projectId);

        if (!$project) {
            throw new AppError('Project not found', 404);
        }

        return $userId == $project->user_id;
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
