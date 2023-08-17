<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Services\CreateProjectService;

class ProjectController extends Controller {

    public function create(CreateProjectRequest $request) {
        $createProjectService = new CreateProjectService();

        return $createProjectService->execute($request->all());
    }
}