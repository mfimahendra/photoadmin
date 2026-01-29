<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/forms', [ClientController::class, 'indexForms'])->name('indexForms');
Route::post('/forms/create', [ClientController::class, 'store'])->name('clients.store');


// Users
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/update', [UserController::class, 'update'])->name('update');
});

// Projects
Route::prefix('projects')->name('projects.')->middleware('auth')->group(function () {
    Route::get('/', [ProjectController::class, 'indexCreateProject'])->name('index');
    Route::get('/create', [ProjectController::class, 'indexCreateProject'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ProjectController::class, 'update'])->name('update');
    Route::post('/{id}/delete', [ProjectController::class, 'destroy'])->name('delete');
});

// Clients
Route::prefix('clients')->name('clients.')->middleware('auth')->group(function () {
    Route::get('/', [ProjectController::class, 'indexClients'])->name('index');
    Route::get('/data', [ProjectController::class, 'getProjectClients'])->name('getProjectClients');
});

// Services

// Payments

// Master
Route::prefix('master')->name('master.')->middleware('auth')->group(function () {    
    Route::get('/index/{masters}', [MasterController::class, 'indexMaster'])->name('index');
    Route::post('/update/{masters}', [MasterController::class, 'updateMaster'])->name('update');
});