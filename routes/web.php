<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth:web')->group(function () {
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/board', [DashboardController::class, 'boards'])->name('boards');
    Route::get('/backlog', [DashboardController::class, 'backlog'])->name('backlog');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('reports');

    Route::get('/project/create', [\App\Http\Controllers\ProjectController::class, 'create']);

});
