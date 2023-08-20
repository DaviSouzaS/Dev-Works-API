<?php

namespace App\Services;

use App\Models\Comment_Project_User;

class UpdateCommentService {

    public function execute(array $data, string $commentId) {

        $comment = Comment_Project_User::find($commentId);

        $comment->update($data);

        return $comment;
    }

}