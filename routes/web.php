<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SpecialisationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Specialisations;



Route::get('/about-us/{id?}', [AboutUsController::class, 'index'])->name('about-us');
//Route::get('/about', function () {
//    return view('about');
//})->name('about');

Route::get('/', [HomeController::class, 'showHomeView'])->name('home');

Route::get('/about-us/{id?}', [AboutUsController::class, 'index'])->name('about-us');

Route::get('/contact', [ContactController::class, 'showContactView'])->name('contact');

Route::get('/specialisations', [SpecialisationsController::class, 'showSpecialisationsView'])->name('specialisations');



//Route::get('products/{id}', function(string $id) {
//return view('showproduct', ['id' => $id]);
//})->name('showproduct');


Route::get('/contact', function() {
    return view('contact');
})->name('contact');


//Route::get('/', function () {
//    return view('home');
//});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
