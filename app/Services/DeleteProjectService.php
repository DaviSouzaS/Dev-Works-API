<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Project;

class DeleteProjectService {

    public function execute(string $projectId) {

        $project = Project::find($projectId);

        if (!$project) {
            throw new AppError('project not found', 404);
        }

        $project->technologies()->delete();
        $project->comments()->delete();
        $project->delete();

        return response()->noContent();
    }

}