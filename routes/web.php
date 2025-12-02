<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\Admin\WatchController as AdminWatchController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

// home page
Route::get('/', function () {
    return view('home');
})->name("home");


// about page
Route::get('/about', function () {
    return view('about');
})->name("about");


// watch routes
Route::resource("watches", WatchController::class);
Route::middleware(["auth"])
    ->prefix("watches")
    ->name("watches.")
    ->group(function () {
        Route::get("/", [WatchController::class, "index"])->name("index");
        Route::get("/{watch}", [WatchController::class, "show"])->name("show");
        Route::get("/category/{slug}", [WatchController::class, "category"])->name("category");
    });

// order routes
Route::middleware(['auth'])
    ->prefix("orders")
    ->name("orders.")
    ->group(function () {
        Route::get("/", [OrderController::class, "index"])->name("index");
    });

// contact routes
Route::middleware(['auth'])
    ->prefix('contact')
    ->name('contact.')
    ->group(function () {
        Route::get('/messages', [ContactController::class, 'index'])->name('index');
        Route::get('/', [ContactController::class, 'create'])->name('create');
        Route::post("/store", [ContactController::class, "store"])->name("store");
    });


// basket routes
Route::middleware(['auth'])
    ->prefix('basket')
    ->name('basket.')
    ->group(function () {
        Route::get('/', [BasketController::class, 'index'])->name('index');
        Route::post("/{watch}", [BasketController::class, "store"])->name("store");
        Route::patch("/{watch}", [BasketController::class, "update"])->name("update");
        Route::delete("/{watch}", [BasketController::class, "destroy"])->name("destroy");
    });


// checkout routes
Route::middleware(['auth'])
    ->prefix('checkout')
    ->name('checkout.')
    ->group(function () {
        Route::get("/", [CheckoutController::class, "index"])->name("index");
        Route::post("/", [CheckoutController::class, "store"])->name("store");
    });

// admin routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // watches
        Route::resource('watches', AdminWatchController::class);

        // suppliers
        Route::resource("suppliers", AdminSupplierController::class);

        // dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

// profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// routes for to search for watches
Route::get('/search', [WatchController::class, 'search'])->name('watches.search');


require __DIR__ . '/auth.php';
