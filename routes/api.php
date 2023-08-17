<?php

use App\Http\Controllers\{AuthController, UserController, ProjectController};
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/user/{id}', [UserController::class, 'readById']);

Route::middleware('jwt.verify')->group(function() {
    Route::patch('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'delete']);
    Route::post('/project', [ProjectController::class, 'create']);
    Route::patch('/project/{id}', [ProjectController::class, 'update']);
});

Route::get('/project/{id}', [ProjectController::class, 'readById']);
Route::get('/project', [ProjectController::class, 'readAll']);
