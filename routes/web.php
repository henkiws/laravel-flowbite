<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\PermissionController;
use App\Http\Controllers\Master\BankController;
use App\Http\Controllers\Master\MusicController;
use App\Http\Controllers\Master\TemplateController;
use App\Http\Controllers\Master\TypeController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Events\EventCoupleController;
use App\Http\Controllers\Events\EventGalleryController;
use App\Http\Controllers\Events\EventGiftsController;
use App\Http\Controllers\Events\EventInvitesController;
use App\Http\Controllers\Events\EventLocationController;
use App\Http\Controllers\Events\EventLoveStoryController;

Route::redirect('/', 'login');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () { 
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // events
        Route::resource('/events', EventController::class);
        Route::prefix('events')->group(function () { 
            Route::resource('/gallery', EventGalleryController::class);
            Route::resource('/couple', EventCoupleController::class);
            Route::resource('/gifts', EventGiftsController::class);
            Route::resource('/invites', EventInvitesController::class);
            Route::resource('/location', EventLocationController::class);
            Route::resource('/lovestory', EventLoveStoryController::class);
        });
    
        // users
        Route::resource('/users', UserController::class);
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions',PermissionController::class);
        // master
        Route::resource('/banks', BankController::class);
        Route::resource('/musics', MusicController::class);
        Route::resource('/templates', TemplateController::class);
        Route::resource('/types', TypeController::class);
        // fallback
        Route::fallback(function() {
            return view('pages/utility/404');
        });    
    });
});
