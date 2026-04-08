<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\PortfolioController;

// Landing page - default route
Route::get('/', [HomeController::class, 'landing'])->name('landing');
// home to dashboard redirect
Route::get('/home', function () {
    return redirect()->route('home');
})->name('home.redirect');

Route::get('/esokhari', [HomeController::class, 'landing'])->name('esokhari.landing');

Auth::routes();

// Dashboard routes (authenticated)
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [HomeController::class, 'index'])->middleware('auth');
Route::get('/overview', [HomeController::class, 'indexOverview'])->name('overview')->middleware('auth');
Route::get('/overview/photographer-events', [HomeController::class, 'getPhotographerEvents'])->name('overview.photographerEvents');

// Users
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/update', [UserController::class, 'update'])->name('update');

    Route::get('/user-action-logs', [UserController::class, 'indexUserActionLogs'])->name('indexUserActionLogs');
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
Route::name('clients.')->group(function () {
    Route::get('/forms', [ClientController::class, 'indexForms'])->name('indexForms');
    Route::post('/forms/create', [ClientController::class, 'store'])->name('store');

    Route::get('/esokhari/{date}/{shortname}', [ClientController::class, 'indexClientProgress'])->name('indexClientProgress');
    Route::get('/esokhari-select-images/{date}/{shortname}', [ClientController::class, 'indexClientPhotoEdits'])->name('indexClientPhotoEdits');

    Route::post('/{id}/save-photo-list', [ClientController::class, 'savePhotoList'])->name('savePhotoList');
    Route::get('/{id}/get-photo-list', [ClientController::class, 'getPhotoList'])->name('getPhotoList');
});


// Financial
Route::prefix('financial')->name('financial.')->middleware('auth')->group(function () {    
    Route::get('/index', [FinancialController::class, 'index'])->name('index');    
    Route::get('/fetch', [FinancialController::class, 'fetch'])->name('fetch');    
});

// Portfolio Management
Route::prefix('portfolio')->name('portfolio.')->middleware('auth')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('index');
    Route::post('/upload', [PortfolioController::class, 'upload'])->name('upload');
    Route::post('/delete', [PortfolioController::class, 'delete'])->name('delete');
});

// Master
Route::prefix('master')->name('master.')->middleware('auth')->group(function () {    
    Route::get('/index/{masters}', [MasterController::class, 'indexMaster'])->name('index');
    Route::post('/update/{masters}', [MasterController::class, 'updateMaster'])->name('update');

    // edit landings page content
    Route::get('/landing-page', [MasterController::class, 'indexEditLandingPage'])->name('indexEditLandingPage');
    Route::post('/landing-page/update-images', [MasterController::class, 'updateLandingImages'])->name('updateLandingImages');
    
    // portfolio images management
    Route::post('/landing-page/upload-portfolio', [MasterController::class, 'uploadPortfolioImage'])->name('uploadPortfolioImage');
    Route::delete('/landing-page/delete-portfolio', [MasterController::class, 'deletePortfolioImage'])->name('deletePortfolioImage');
    
    // hero image management
    Route::post('/landing-page/upload-hero', [MasterController::class, 'uploadHeroImage'])->name('uploadHeroImage');
});