<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('agency.test');
})->name('test');

Route::get('/dashboard', function () {
    return view('agency.dashboard');
})->middleware(['auth:agency', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
