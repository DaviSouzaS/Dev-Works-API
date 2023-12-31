<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CreateUserRequest, DeleteUserRequest, UpdateUserRequest};
use App\Services\{CreateUserService, DeleteUserService, ReadUserByIdService, UpdateUserService};

class UserController extends Controller {

    public function create(CreateUserRequest $request) {
        $createUserService = new CreateUserService();

        return $createUserService->execute($request->all());
    }

    public function readById(string $id) {
       
        $readUserByidService = new ReadUserByIdService();

        return $readUserByidService->execute($id);
    }

    public function update(UpdateUserRequest $request) {
        
        $updateUserService = new UpdateUserService();

        $userId = auth()->user()->id;

        return $updateUserService->execute($request->all(), $userId);
    }

    public function delete(DeleteUserRequest $request) {
        $deleteUserService = new DeleteUserService();

        $userId = auth()->user()->id;

        return $deleteUserService->execute($userId);
    }
}