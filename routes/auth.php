<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RecoveryCodeController;
use App\Http\Controllers\Auth\RegistrerController;
use App\Http\Controllers\Auth\TwoFactorAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.post');

    Route::get('register', [RegistrerController::class, 'create'])
        ->name('register.create');


});

Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('two-factor', [TwoFactorAuthenticationController::class, 'store'])->name('two-factor.enable');
Route::get('two-factor-qr-code', [TwoFactorAuthenticationController::class, 'show'])->name('two-factor-qr-code.index');
Route::get('two-factor-recovery-code', [RecoveryCodeController::class, 'index'])->name('two-factor-recovery-code.index');



Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
