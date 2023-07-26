<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;

class ReadUserByIdService {
    public function execute(string $id) {
        
        $userExist = User::find($id);

        if (is_null($userExist)) {
            throw new AppError('User not found', 404);
        }

        return response()->json($userExist);
    }
}