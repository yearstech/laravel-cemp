<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIfLoggedIn;

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(CheckIfLoggedIn::class);;

// Dashboard
Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware(CheckIfLoggedIn::class);

// User
Route::middleware(CheckIfLoggedIn::class)->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
});
// Settings
Route::middleware(CheckIfLoggedIn::class)->group(function () {
    Route::get('/settings', [SettingController::class, 'showAll'])->name('settings.all');
    Route::put('/settings-all', [SettingController::class, 'updateAll'])->name('settings.update.all');
    Route::get('/settings/manage', [SettingController::class, 'manage'])->name('settings.manage');
    Route::post('/settings/store', [SettingController::class, 'store'])->name('settings.store');
    Route::delete('/settings/{setting}', [SettingController::class, 'destroy'])->name('settings.destroy');
    Route::get('/settings/{setting}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
});
