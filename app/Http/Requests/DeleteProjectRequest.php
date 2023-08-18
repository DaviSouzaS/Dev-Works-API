<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class DeleteProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
       
        $userIsDev = auth()->user()->is_dev;

        if ($userIsDev) {
           $projectId = $this->route('id');
           $userId =  auth()->user()->id;

           $project = Project::find($projectId);

           return $userId == $project->user_id;
        }

        return true;
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
