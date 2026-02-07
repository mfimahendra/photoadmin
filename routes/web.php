<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
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
Route::get('/overview', [HomeController::class, 'indexOverview'])->name('overview');
Route::get('/overview/photographer-events', [HomeController::class, 'getPhotographerEvents'])->name('overview.photographerEvents');

Route::get('/esokhari/{date}/{shortname}', [ClientController::class, 'indexClientProgress'])->name('indexClientProgress');


// Users
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/update', [UserController::class, 'update'])->name('update');
});

// Projects
Route::prefix('projects')->name('projects.')->middleware('auth')->group(function () {    
    Route::get('/create', [ProjectController::class, 'indexCreateProject'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ProjectController::class, 'update'])->name('update');
    Route::post('/{id}/delete', [ProjectController::class, 'destroy'])->name('delete');
    Route::post('/update-progress', [ProjectController::class, 'updateProgress'])->name('updateProgress');
    Route::post('/update-photographer', [ProjectController::class, 'updatePhotographer'])->name('updatePhotographer');
    Route::post('/update-gdrive-link', [ProjectController::class, 'updateDriveLink'])->name('updateDriveLink');

    Route::get('/data', [ProjectController::class, 'getProjectClients'])->name('getProjectClients');
    Route::get('/', [ProjectController::class, 'indexClients'])->name('index');
});

// Clients view
Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/forms', [ClientController::class, 'indexForms'])->name('indexForms');
    Route::post('/forms/create', [ClientController::class, 'store'])->name('store');
});


// Payments

// Master
Route::prefix('master')->name('master.')->middleware('auth')->group(function () {    
    Route::get('/index/{masters}', [MasterController::class, 'indexMaster'])->name('index');
    Route::post('/update/{masters}', [MasterController::class, 'updateMaster'])->name('update');
});