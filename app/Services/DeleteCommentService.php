<?php

namespace App\Services;

use App\Models\Comment_Project_User;

class DeleteCommentService {

    public function execute(string $commentId) {

        $comment = Comment_Project_User::find($commentId);

        $comment->delete();

        return response()->noContent();
    }

}