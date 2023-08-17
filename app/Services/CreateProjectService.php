<?php

namespace App\Services;

use App\Models\User;

class CreateProjectService {

    public function execute(array $data) {

        $userId = auth()->user()->id;

        $user = User::find($userId);

        $project = $user->projects()->create($data);

        if (isset($data["technologies"])) {
            $technologies = array_map(function ($tech) {
                return ["name" => $tech];
            }, $data["technologies"]);

            $project->technologies()->createMany($technologies);
        }

        $project->technologies;

        return $project;
    }

}