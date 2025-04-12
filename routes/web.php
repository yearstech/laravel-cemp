<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\CheckIfLoggedIn;
use App\Http\Controllers\EventTypeController;
use App\Models\EventType;

Route::get('/event-types', [EventTypeController::class, 'index'])->name('event-types.index');
Route::get('/event-types/create', [EventTypeController::class, 'create'])->name('event-types.create');  // Changed to match event-types.create
Route::post('/event-types/store', [EventTypeController::class, 'store'])->name('event-types.store');  // Changed to match event-types.store





// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(CheckIfLoggedIn::class);;

// Dashboard
Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware(CheckIfLoggedIn::class);

// User
Route::middleware(CheckIfLoggedIn::class)->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/userlist', [UserController::class, 'list'])->name('user.list');
    Route::get('/useredit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/userupdate/{id}', [UserController::class, 'update'])->name('user.update');
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

    Route::get('/permissons/index',[PermissionController::class,'index'])->name('permissions.index');
    Route::get('/permissons/create',[PermissionController::class,'create'])->name('permissions.create');
    Route::post('/permissons/store',[PermissionController::class,'store'])->name('permissions.store');
    Route::get('/permissons/lists',[PermissionController::class,'index'])->name('permissions.lists');

    Route::get('/roles/index',[RoleController::class,'index'])->name('roles.index');
    Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
    // Route::get('/roles/lists',[RoleController::class,'index'])->name('roles.lists');
});
