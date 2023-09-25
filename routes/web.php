<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RouteController;
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
//Route
Route::get('/', [RouteController::class, 'home'])->name('home');
Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/user-profile', [RouteController::class, 'profile'])->name('profile');
Route::get('/dashboard/user-profile/edit', [RouteController::class, 'profileEdit'])->name('user.edit');
Route::put('/dashboard/user-profile/update', [RouteController::class, 'profileUpdate'])->name('user.update');
//Route CRUD Book
Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);