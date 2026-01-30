<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\PrincipleController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    
    // Services
    Route::resource('services', ServiceController::class);
    
    // Partners
    Route::resource('partners', PartnerController::class);
    
    // Solutions
    Route::resource('solutions', SolutionController::class);
    
    // Principles
    Route::resource('principles', PrincipleController::class);
    
    // Stats
    Route::resource('stats', StatController::class);
    
    // News
    Route::resource('news', NewsController::class);
});
