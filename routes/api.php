<?php

use App\Http\Controllers\{AuthController, UserController};
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/user/{id}', [UserController::class, 'readById']);