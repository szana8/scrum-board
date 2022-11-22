<?php

use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/password-confirm', [PasswordConfirmationController::class, 'index'])->name('profile.password-confirm');
