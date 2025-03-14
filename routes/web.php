<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management Routes
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
    Route::get('/user-management/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/user-management', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/user-management/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::patch('/user-management/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/user-management/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';