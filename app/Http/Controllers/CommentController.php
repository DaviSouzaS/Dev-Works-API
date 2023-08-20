<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Services\CreateCommentService;
use App\Services\ReadAllCommentsByProjectService;
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
}