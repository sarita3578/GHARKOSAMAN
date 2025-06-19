<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;

Route::get('/db-test', function() {
    try {
        DB::connection()->getPdo();
        return 'Database connection is OK!';
    } catch (\Exception $e) {
        return 'Database connection failed: ' . $e->getMessage();
    }
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/', function () {
    return view('welcome');  // or 'home' if you prefer naming
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
