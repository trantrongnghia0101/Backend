<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes for ProductController
Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');

// Routes for User and Role Controllers
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

Route::get('/login', [UserController::class, 'indexlogin'])->name('admin');
Route::post('/login', [UserController::class, 'login'])->name('login');

// Note: If you have other routes, make sure to include them as well
