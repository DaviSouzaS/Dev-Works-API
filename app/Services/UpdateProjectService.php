<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Project;

class UpdateProjectService {

    public function execute(array $data, string $projectId) {

        $project = Project::find($projectId);

        if (!$project) {
            throw new AppError('project not found', 404);
        }

        $project->update($data);

        if (isset($data["technologies"])) {
            $project->technologies()->delete();
            
            $technologies = array_map(function ($tech) {
                return ["name" => $tech];
            }, $data["technologies"]);

            $project->technologies()->createMany($technologies);
        }

        $project->technologies;

        return $project;
    }

}