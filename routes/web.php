<?php

use App\Http\Controllers\ProfileController;
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
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

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

/*
|--------------------------------------------------------------------------
| Middleware: Redirect /dashboard to /admin/dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Redirect Breeze's default dashboard to admin dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
