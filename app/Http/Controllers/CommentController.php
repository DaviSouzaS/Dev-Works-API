<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\DeleteCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\CreateCommentService;
use App\Services\DeleteCommentService;
use App\Services\ReadAllCommentsByProjectService;
use App\Services\UpdateCommentService;
use Illuminate\Foundation\Http\FormRequest;

class CommentController extends Controller {

   public function create(CreateCommentRequest $request) {
      $createCommentService = new CreateCommentService();

      $projectId = $request->route('id');

      return $createCommentService->execute($request->all(), $projectId);
   }

   public function readAll(FormRequest $request) {
      $readAllCommentsByProject = new ReadAllCommentsByProjectService();

      $projectId = $request->route('id');

      return $readAllCommentsByProject->execute($projectId);
   }

   public function update (UpdateCommentRequest $request) {
      $updateCommentService = new UpdateCommentService();

      $commentId = $request->route('id');

      return $updateCommentService->execute($request->all(), $commentId);
   }

   public function delete (DeleteCommentRequest $request) {
      $deleteCommentService = new DeleteCommentService();

      $commentId = $request->route('id');

      return $deleteCommentService->execute($commentId);
   }
}