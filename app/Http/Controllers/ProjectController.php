<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Services\CreateProjectService;
use App\Services\ReadAllProjectsService;
use App\Services\ReadProjectByIdService;

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
}