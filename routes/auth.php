<?php

use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
