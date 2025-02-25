<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/why', [HomeController::class, 'why'])->name('why');

Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('testimonial');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
