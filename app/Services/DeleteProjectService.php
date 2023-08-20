<?php

namespace App\Services;

use App\Models\Project;

class DeleteProjectService {

    public function execute(string $projectId) {

        $project = Project::find($projectId);

        $project->technologies()->delete();
        $project->comments()->delete();
        $project->delete();

        return response()->noContent();
    }

}