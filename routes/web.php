<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('show_article');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile/', [\App\Http\Controllers\UserProfileController::class, 'showProfile'])->name('profile')
        ->middleware('verified');
    Route::post('/profile_handle', [\App\Http\Controllers\UserProfileController::class, 'edit'])->name('profile_handle');
    Route::post('/profile_reset_password', [\App\Http\Controllers\UserProfileController::class, 'resetPassword'])->name('profile_reset_password');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login_handle', [AuthController::class, 'login'])->name('login_handle');

    Route::get('/registration', [AuthController::class, 'registrationForm'])->name('registration');
    Route::post('/register_handle', [AuthController::class, 'register'])->name('register_handle');

    Route::get('/forgot', [AuthController::class, 'forgotForm'])->name('password.request');
    Route::post('/forgot_handle', [AuthController::class, 'forgot'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset_password_handle', [AuthController::class, 'passwordUpdate'])->name('password.update');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('profile'));
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with(['status' => __('verification-link-sent')]);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
