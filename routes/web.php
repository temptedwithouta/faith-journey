<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function (): void {
    Route::controller(AuthController::class)->group(function (): void {
        Route::get('/login', 'index')->name('auth.index');

        Route::post('/login', 'login')->name('auth.login');
    });

    Route::controller(UserController::class)->group(function (): void {
        Route::get('/register', 'index')->name('users.register');
    });
});

Route::resource('devotions', DevotionController::class)->where(['devotion' => '[0-9]+']);

Route::resource('users', UserController::class);