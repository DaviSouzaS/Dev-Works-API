<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Comment_Project_User;
use App\Models\Project;

class ReadAllCommentsByProjectService {
    public function execute(string $projectId) {

        $project = Project::find($projectId);

        if (!$project) {
            throw new AppError('Project not found', 404);
        }

        $comments = Comment_Project_User::where('project_id', '=', $projectId)->get();

        if (count($comments) == 0) {
            throw new AppError('Comments not found', 404);
        }

        return $comments;
    }
}