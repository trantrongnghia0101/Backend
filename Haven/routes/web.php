<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
=======
>>>>>>> origin/main

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD


Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

Route::get('/login', [UserController::class, 'indexlogin'])->name('admin');
Route::post('/login', [UserController::class, 'login'])->name('login');
// Route::get('/logout', [UserController::class, 'logout'])->name('logout');
=======
>>>>>>> origin/main
