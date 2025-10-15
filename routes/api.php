<?php

use App\Http\Controllers\Api\Auth\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('register/check', [AuthController::class, 'check_register']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth-api');
    Route::post('forget/password', [PasswordController::class, 'ForgetPassword']);
    Route::post('reset/password', [PasswordController::class, 'RestPassword']);
});
