<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Project;

class ReadAllProjectsService {
    public function execute() {
        
        $projectExist = Project::with("technologies", "comments")->get();

        if (!sizeof($projectExist)) {
            throw new AppError('Projects not found', 404);
        }

        return response()->json($projectExist);
    }
}