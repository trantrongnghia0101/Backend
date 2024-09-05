<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
// Route::delete('/destroy/{product}', [ProductController::class, 'update'])->name('update');
