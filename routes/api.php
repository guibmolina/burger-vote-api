<?php

use App\Http\Controllers\BurgerVoteController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [OrderController::class, 'register']);

Route::get('/list', [BurgerVoteController::class, 'list']);

Route::post('/vote', [BurgerVoteController::class, 'vote'])->middleware('auth:sanctum');

