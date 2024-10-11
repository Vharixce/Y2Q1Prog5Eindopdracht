<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/about-us/{id?}', [AboutUsController::class, 'index'])->name('about-us');


Route::get('products/{id}', function(string $id) {
return view('showproduct', ['id' => $id]);
})->name('showproduct');


Route::get('/contact', function() {
    return view('contact');
})->name('contact');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
