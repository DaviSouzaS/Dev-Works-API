<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;

class UpdateUserService {
    public function execute(array $data, string $id) {

        $user = User::find($id);

        if (!$user) {
            throw new AppError('User not found', 404);
        }

        $user->update($data);

        return $user;
    }
}