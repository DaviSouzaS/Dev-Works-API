<?php

use App\Http\Controllers\{AuthController, UserController, ProjectController, CommentController};
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/user/{id}', [UserController::class, 'readById']);

Route::middleware('jwt.verify')->group(function() {
    Route::patch('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'delete']);

    Route::post('/project', [ProjectController::class, 'create']);
    Route::patch('/project/{id}', [ProjectController::class, 'update']);
    Route::delete('/project/{id}', [ProjectController::class, 'delete']);

    Route::post('/comment/{id}', [CommentController::class, 'create']);
    Route::patch('/comment/{id}', [CommentController::class, 'update']);
    Route::delete('/comment/{id}', [CommentController::class, 'delete']);
});

Route::get('/project/{id}', [ProjectController::class, 'readById']);
Route::get('/project', [ProjectController::class, 'readAll']);

Route::get('/comment/{id}', [CommentController::class, 'readAll']);