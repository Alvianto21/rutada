<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DasboardController;
use App\Livewire\UsersProfile;
use App\Livewire\CreateUser;
use App\Livewire\EditUser;

// public routes
Route::get('/', [HomeController::class, 'index']);

Route::get('/contact', [HomeController::class, 'contact']);

//guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::get('/forget-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

    Route::post('/forget-password', [PasswordResetLinkController::class, 'store']);

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

//authenticated user routes
Route::middleware(['auth', 'verified'])->group(function (){
    // Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [DasboardController::class, 'profile'])->name('profile');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

//admin routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/users', UsersProfile::class)->name('users');

    Route::get('/users/create', CreateUser::class)->name('users.create');

    Route::get('/users/{user:username}/edit', EditUser::class)->name('users.edit');
});

//API routes
Route::prefix('api')->group((function () {
    Route::get('/user', [UserController::class, 'index'])->name('api.user.index');
}));

require __DIR__.'/auth.php';
