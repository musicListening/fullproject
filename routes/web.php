<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;


// Admin Orders - Option 2 without middleware
Route::get('/admin/orders', function () {
    if (!Auth::check() || !Auth::user()->is_admin) {
        return redirect()->route('pricing');
    }
    return app(\App\Http\Controllers\Admin\AdminOrderController::class)->index();
})->name('admin.orders');

Route::post('/admin/orders/{order}/complete', function (\App\Models\Order $order) {
    if (!Auth::check() || !Auth::user()->is_admin) {
        return redirect()->route('pricing');
    }
    return app(\App\Http\Controllers\Admin\AdminOrderController::class)->complete($order);
})->name('admin.orders.complete');

Route::delete('/admin/orders/{order}/delete', function (\App\Models\Order $order) {
    if (!Auth::check() || !Auth::user()->is_admin) {
        return redirect()->route('pricing');
    }
    return app(\App\Http\Controllers\Admin\AdminOrderController::class)->destroy($order);
})->name('admin.orders.delete');


// Pricing page using controller
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');


// Admin routes (only admins can access)
Route::get('/admin-dashboard', [ProductController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');

Route::post('/admin/products', [ProductController::class, 'store'])->middleware('auth')->name('admin.products.store');
Route::post('/admin/products/{product}/update', [ProductController::class, 'update'])->middleware('auth')->name('admin.products.update');
Route::delete('/admin/products/{product}/delete', [ProductController::class, 'destroy'])->middleware('auth')->name('admin.products.delete');

// Order routes
Route::post('/order', [OrderController::class, 'store'])->middleware('auth')->name('order.store');
Route::post('/order/{order}/complete', [OrderController::class, 'complete'])->middleware('auth')->name('order.complete');

// Force logout
Route::get('/force-logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
});

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// User Dashboard
Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth'])->name('user.dashboard');

// Authentication routes
require __DIR__.'/auth.php';

Route::get('/orders/{id}/download-pdf', [\App\Http\Controllers\OrderController::class, 'downloadPDF'])->name('order.download.pdf');
Route::get('/orders/pdf/{id}', [OrderController::class, 'downloadPDF'])->name('order.download');

// routes/web.php
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
