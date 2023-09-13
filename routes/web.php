<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('/article/{id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('show_article');

Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'loginForm'])->name('login');
Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::post('/login_handle', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login_handle');

Route::get('/registration', [\App\Http\Controllers\Auth\AuthController::class, 'registrationForm'])->name('registration');
Route::post('/register_handle', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register_handle');
