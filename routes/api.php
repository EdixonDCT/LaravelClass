<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Profile;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterAprendizController;

Route::get('/profiles', function () {
    return Profile::all();
});
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/registerAprendiz  ', [RegisterAprendizController::class, 'store']);

Route::post('/login', [LoginController::class, 'store']);
