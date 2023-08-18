<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\DeleteProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Services\CreateProjectService;
use App\Services\DeleteProjectService;
use App\Services\ReadAllProjectsService;
use App\Services\ReadProjectByIdService;
use App\Services\UpdateProjectService;

class ProjectController extends Controller {

    public function create(CreateProjectRequest $request) {
        $createProjectService = new CreateProjectService();

        return $createProjectService->execute($request->all());
    }

    public function readById(string $id) {
        $readProjectByIdService = new ReadProjectByIdService();

        return $readProjectByIdService->execute($id);
    }

    public function readAll() {
        $readAllProjects = new ReadAllProjectsService();

        return $readAllProjects->execute();
    }

    public function update(UpdateProjectRequest $request) {

        $updateProject = new UpdateProjectService();

        $projectId = $request->route('id');

        return $updateProject->execute($request->all(), $projectId);
    }

    public function delete(DeleteProjectRequest $request) {
        $deleteProject = new DeleteProjectService();

        $projectId = $request->route('id');

        return $deleteProject->execute($projectId);
    }
}