<?php

use App\Core\Route;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\PulseController;
use App\Controllers\RealtimeController;
use App\Controllers\DocsController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/docs', function () {
    view('docs.swagger');
})->name('docs');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/lang/{code}', [HomeController::class, 'switchLang'])->name('lang.switch');

// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Zen Pulse & Realtime Endpoints
Route::post('/_zen/pulse', [PulseController::class, 'handle'])->name('zen.pulse');
Route::get('/_zen/sse', [RealtimeController::class, 'stream'])->name('zen.sse');

// Documentation Routes
Route::get('/docs', [DocsController::class, 'index'])->name('docs.index');
Route::get('/docs/{page}', [DocsController::class, 'show'])->name('docs.show');
