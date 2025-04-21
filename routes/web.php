<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckIfLoggedIn;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EventTypeController;

// Event Types


// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(CheckIfLoggedIn::class);;
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('sign-up');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Dashboard
Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware(CheckIfLoggedIn::class);

// User
Route::middleware(CheckIfLoggedIn::class)->group(function () {
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/users', [UserController::class, 'list'])->name('user.list');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('users/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
});

// Roles and Permissions
Route::middleware(CheckIfLoggedIn::class)->group(function () {
    Route::get('/permissons', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissons/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissons/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissons/{permission}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::patch('/permissons/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissons/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/event-types', [EventTypeController::class, 'index'])->name('event-type.index');
    Route::get('/event-types/create', [EventTypeController::class, 'create'])->name('event-type.create');
    Route::post('/event-types/store', [EventTypeController::class, 'store'])->name('event-type.store');
    Route::delete('/event-types/{event_type}', [EventTypeController::class, 'destroy'])->name('event-type.destroy');
    Route::get('event-types/{event_type}/edit', [EventTypeController::class, 'edit'])->name('event-type.edit');
    Route::patch('event-types/{event_type}', [EventTypeController::class, 'update'])->name('event-type.update');
    //Event
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
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
