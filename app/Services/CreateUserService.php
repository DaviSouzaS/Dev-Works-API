<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;

class CreateUserService {
    public function execute(array $data) {

        $emailIsUnique = User::firstWhere('email', $data['email']);

        if (!is_null($emailIsUnique)) {
            throw new AppError('Email already exists', 409);
        }

        return User::create($data);
    }
}