<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\PermissionController;
use App\Http\Controllers\Master\BankController;
use App\Http\Controllers\Master\MusicController;
use App\Http\Controllers\Master\TemplateController;
use App\Http\Controllers\Events\EventController;

Route::redirect('/', 'login');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () { 
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // events
        Route::resource('/events', EventController::class);
        // users
        Route::resource('/users', UserController::class);
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions',PermissionController::class);
        // master
        Route::resource('/banks', BankController::class);
        Route::resource('/musics', MusicController::class);
        Route::resource('/templates', TemplateController::class);
        // fallback
        Route::fallback(function() {
            return view('pages/utility/404');
        });    
    });
});
