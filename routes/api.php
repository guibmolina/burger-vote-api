<?php

use App\Http\Controllers\BurgerVoteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);

Route::get('/list', [BurgerVoteController::class, 'list']);

Route::post('/vote', [BurgerVoteController::class, 'vote'])->middleware('auth:sanctum');

