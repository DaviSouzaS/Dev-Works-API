<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Project;
use App\Models\Comment_Project_User;

class CreateCommentService {

    public function execute(array $data, string $projectId) {

        $project = Project::find($projectId);

        if (!$project) {
            throw new AppError('Project not found', 404);
        }

        $userId = auth()->user()->id;

        $project->comments_user()->attach($userId, $data);

        $comments = Comment_Project_User::where('project_id', '=', $projectId)->get();

        return $comments[sizeof($comments) - 1];
    }
}