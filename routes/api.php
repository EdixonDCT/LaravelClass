<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Profile;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/profiles', function () {
    return Profile::all();
});
Route::post('/register', [RegisterController::class, 'store']);

// Route::post('/login', [LoginController::class, 'store']);


// Route::post('/user', [UserController::class, 'store']);

