<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Project;

class ReadProjectByIdService {
    public function execute(string $id) {
        
        $projectExist = Project::with("technologies")->find($id);

        if (is_null($projectExist)) {
            throw new AppError('Project not found', 404);
        }

        return response()->json($projectExist);
    }
}