<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\PermissionController;

Route::redirect('/', 'login');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () { 
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
        Route::fallback(function() {
            return view('pages/utility/404');
        });    
    });
});
