<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContributionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/form', function () {
    return view('form');
})->middleware(['auth', 'verified'])->name('form');

Route::post('/submit-form', [ContributionController::class, 'store'])->middleware(['auth', 'verified'])->name('form.submit');

Route::get('/table', function () {
    return view('table');
})->middleware(['auth', 'verified'])->name('table');

Route::get('/table', [ContributionController::class,'index'])->middleware(['auth', 'verified'])->name('table');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
