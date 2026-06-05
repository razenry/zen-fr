<?php

use App\Core\Route;
use App\Controllers\HomeController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
