<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('warehouse.test');
})->name('test');

Route::get('/dashboard', function () {
    return view('warehouse.dashboard');
})->middleware(['auth:warehouse', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
