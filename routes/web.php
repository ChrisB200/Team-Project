<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\Admin\WatchController as AdminWatchController;
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

Route::get('/basket', function () {
    return view("basket");
})->name("basket");


Route::get("watches/category/{slug}", [WatchController::class, "category"])
    ->name("watches.category");

Route::resource("watches", WatchController::class);


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

require __DIR__ . '/auth.php';
