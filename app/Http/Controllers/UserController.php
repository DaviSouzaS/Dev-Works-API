<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\CreateUserService;
use App\Services\ReadUserByIdService;

class UserController extends Controller {

    public function create(CreateUserRequest $request) {
        $createUserService = new CreateUserService();

        return $createUserService->execute($request->all());
    }

    public function readById(string $id) {
       
        $readUserByidService = new ReadUserByIdService();

        return $readUserByidService->execute($id);
    }
}