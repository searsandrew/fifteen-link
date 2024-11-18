<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function() {
        Route::resource('link', App\Http\Controllers\LinkController::class);
        Route::view('/dashboard', 'dashboard')->name('dashboard');
    });
    Route::resource('profile', App\Http\Controllers\ProfileController::class)->only(['update', 'destroy']);
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__.'/auth.php';

Route::get('/{reference}', [App\Http\Controllers\RedirectService::class, 'go'])->name('redirect');
