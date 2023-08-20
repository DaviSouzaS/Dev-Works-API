<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Project;
use App\Models\User;

class DeleteUserService {
    public function execute(string $id) {

        $user = User::find($id);

        if (!$user) {
            throw new AppError('User not found', 404);
        }

        if ($user->is_dev) {

            $projects = Project::where('user_id', '=', $id)->get();

            foreach ($projects as $project) {
                $project->technologies()->delete();
            }

            $user->comments()->delete();
            $user->projects()->delete();
            $user->delete();

            return response()->noContent();
        }

        $user->comments()->delete();
        $user->delete();

        return response()->noContent();
    }
}