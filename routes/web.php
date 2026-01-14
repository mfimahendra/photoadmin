<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// Users
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/update', [UserController::class, 'update'])->name('update');
});

// Clients
Route::prefix('clients')->name('clients.')->middleware('auth')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
});

// Projects
Route::prefix('projects')->name('projects.')->middleware('auth')->group(function () {
    Route::get('/', [ProjectController::class, 'indexCreateProject'])->name('index');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
});

// Services

// Payments

// users