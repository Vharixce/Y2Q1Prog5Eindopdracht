<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // Ensure you import your controller at the top

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/search', [ClassTypeController::class, 'search'])->name('search');

// Middleware for admin routes
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [SomeAdminController::class, 'index'])->name('admin.dashboard');
    // Add more admin routes here as needed
});

Route::get('/about-us/{id?}', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/', [HomeController::class, 'showHomeView'])->name('home');
Route::get('/contact', [ContactController::class, 'showContactView'])->name('contact');

Route::resource('classTypes', ClassTypeController::class);
Route::resource('class_types', ClassTypeController::class);
Route::get('/class-types', [ClassTypeController::class, 'index'])->name('classTypes.index');
Route::get('/class-types/filter', [ClassTypeController::class, 'filter'])->name('classTypes.filter');

// User profile routes
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');


require __DIR__.'/auth.php';

// Any additional routes can be added here

