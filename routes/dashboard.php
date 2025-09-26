<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\ProfileController;

Route::get('login', [AuthController::class, 'viewLogin'])->name('login.view')->withoutMiddleware(['admin', 'check.permission']);
Route::post('login', [AuthController::class, 'login'])->name('login.login')->withoutMiddleware(['admin', 'check.permission']);
Route::get('/unauthorized', function () {
    return view('admin.unauthorized');
})->name('unauthorized')->withoutMiddleware(['admin']);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('roles', RoleController::class);
Route::group(['prefix' => 'profile'], function () {
    Route::get('change_lang/{lang}', [ProfileController::class, 'changeLang'])->name('profile.change.lang');
    Route::get('change_theme/{theme}', [ProfileController::class, 'changeTheme'])->name('profile.change.theme');
});
