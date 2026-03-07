<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

// Public
Route::get('/', HomeController::class)->name('home');



// Guest admin (belum login)
Route::middleware('guest:admin')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login.form');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login');
});

// Admin only
Route::middleware(['auth:admin'])
    ->group(function () {

        Route::resource('project', ProjectController::class);

        Route::resource('admin', AdminController::class)
            ->except(['show']);

        Route::post('/logout', [LoginController::class, 'logout'])
            ->name('logout');
    });
