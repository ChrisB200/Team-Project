<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\Admin\WatchController as AdminWatchController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/about', function () {
    return view('about');
})->name("about");


Route::get("watches/category/{slug}", [WatchController::class, "category"])
    ->name("watches.category");

Route::middleware(['auth'])
    ->get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');

Route::resource("watches", WatchController::class);

// View basket
Route::get('/basket', [BasketController::class, 'index'])
    ->name('basket.index')
    ->middleware('auth');

// Add item to basket
Route::post('/basket/{watch}', [BasketController::class, 'store'])
    ->name('basket.store')
    ->middleware('auth');

// Update quantity
Route::patch('/basket/{item}', [BasketController::class, 'update'])
    ->name('basket.update')
    ->middleware('auth');

Route::delete('/basket/{item}', [BasketController::class, 'destroy'])
    ->name('basket.destroy')
    ->middleware('auth');

Route::get("/checkout", [CheckoutController::class, "index"])
    ->name("checkout.index")
    ->middleware("auth");

// admin routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // watches
        Route::resource('watches', AdminWatchController::class);

        // suppliers
        Route::resource("suppliers", AdminSupplierController::class);
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store')
    ->middleware('auth');

require __DIR__ . '/auth.php';
