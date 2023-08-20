<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Services\CreateCommentService;

class CommentController extends Controller {

   public function create(CreateCommentRequest $request) {
      $createCommentService = new CreateCommentService();

      $projectId = $request->route('id');

      return $createCommentService->execute($request->all(), $projectId);
   }
}