<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:super_admin'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
});

Route::middleware(['auth', 'verified', 'role:super_admin,inventory_manager'])->group(function () {
    Route::resource('manufacturers', ManufacturerController::class)->except(['create', 'edit']);
    Route::resource('locations', LocationController::class)->except(['create', 'edit']);
});

Route::middleware(['auth', 'verified', 'role:super_admin,inventory_user'])->group(function () {
    Route::resource('assets', AssetController::class)->except(['create', 'edit']);
});

// Route::get('/about', function () {
//     return '<h1>About us</h1><p>We are a company that does cool stuff.</p>';
// });

// Route::get('/users/{id}', function (string $id) {
//     return "User ID: " . $id;
// });

// Route::get('/products/{category?}/{name}', function (?string $category  = null, string $name) {
//     if ($category) {
//         return "Product: {$name} in Category: {$category}";
//     }
//     return "Product: {$name}";
// });


// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Admin Dashboard';
//     });

//     Route::get('/users', function () {
//         return 'Manage Admin Users';
//     });
// });

// Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('assets', [AssetController::class, 'index'])->name('assets.index');
// Route::get('locations', [LocationController::class, 'index'])->name('locations.index');
// Route::get('manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers.index');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
