<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class AuthController extends Controller {
    public function login (LoginRequest $request) {

        $loginService = new LoginService();

        return $loginService->execute($request->all());
    }
}
