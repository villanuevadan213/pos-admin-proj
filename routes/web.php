<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\OrderTrackingController;
use App\Http\Controllers\InventoryManagementController;
use App\Http\Controllers\POSController;
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

    // Order Tracking Routes
    Route::get('/order-tracking', [OrderTrackingController::class, 'index'])->name('order-tracking');
    Route::get('/order-tracking/{order}', [OrderTrackingController::class, 'show'])->name('order.show');
    Route::get('/order-tracking/{order}/edit', [OrderTrackingController::class, 'edit'])->name('order.edit');
    Route::post('/order-tracking', [OrderTrackingController::class, 'store'])->name('order.store');
    Route::patch('/order-tracking/{order}', [OrderTrackingController::class, 'update'])->name('order.update');
    Route::delete('/order-tracking/{order}', [OrderTrackingController::class, 'destroy'])->name('order.destroy');

    // Inventory Management Routes
    Route::get('/inventory-management', [InventoryManagementController::class, 'index'])->name('inventory-management');
    Route::get('/inventory-management/create', [InventoryManagementController::class, 'create'])->name('inventory.create');
    Route::post('/inventory-management', [InventoryManagementController::class, 'store'])->name('inventory.store');
    Route::get('/inventory-management/{item}/edit', [InventoryManagementController::class, 'edit'])->name('inventory.edit');
    Route::patch('/inventory-management/{item}', [InventoryManagementController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory-management/{item}', [InventoryManagementController::class, 'destroy'])->name('inventory.destroy');

    // POS Routes
    Route::get('/pos', [POSController::class, 'index'])->name('pos');
    Route::post('/pos/checkout', [POSController::class, 'checkout'])->name('pos.checkout');
    Route::get('/pos/checkout', [POSController::class, 'showCheckout'])->name('pos.checkout.show');
    Route::get('/pos/history', [POSController::class, 'history'])->name('pos.history');
    Route::post('/pos/confirm-checkout', [POSController::class, 'confirmCheckout'])->name('pos.confirm_checkout');
});

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';