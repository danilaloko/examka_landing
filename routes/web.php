<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('landing.index');
});

// Дополнительные маршруты для лендинга
Route::get('/landing', function () {
    return view('landing.index');
});

// Маршруты для авторизации
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/auth', [AuthController::class, 'showLoginForm']);

// API маршруты для обработки авторизации
Route::post('/auth/telegram/callback', [AuthController::class, 'handleTelegramCallback'])->name('auth.telegram.callback');
Route::post('/auth/telegram', [AuthController::class, 'handleTelegramCallback'])->name('auth.telegram');
Route::post('/auth/email', [AuthController::class, 'loginWithEmail'])->name('auth.email');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Маршруты для профиля пользователя
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/projects', [ProfileController::class, 'myProjects'])->name('profile.projects');
Route::get('/profile/new-project', [ProfileController::class, 'newProject'])->name('profile.new-project');
