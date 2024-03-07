<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/info/client', [UserController::class, 'showInfoClient']);
Route::get('/info/server', [UserController::class, 'showInfoServer']);
Route::get('/info/database', [UserController::class, 'showInfoDB']);
