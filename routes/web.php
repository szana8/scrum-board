<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Settings\ClientCredentialController;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/board', [DashboardController::class, 'boards'])->name('boards');
    Route::get('/backlog', [DashboardController::class, 'backlog'])->name('backlog');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('reports');

    Route::get('/project/create', [ProjectController::class, 'create']);
    Route::post('projects', [ProjectController::class, 'store']);


    Route::prefix('settings')->group(function() {

        Route::prefix('client-credential')->group(function() {
            Route::get('', [ClientCredentialController::class, 'index'])->name('client-credential.index');
            Route::post('', [ClientCredentialController::class, 'store'])->name('client-credential.store');
            Route::get('popup/{client}', [ClientCredentialController::class, 'popup'])->name('client-credential.popup');
            Route::delete('/{client}', [ClientCredentialController::class, 'destroy'])->name('client-credential.destroy');
            Route::get('/close', function () {
                return Inertia::location(\route('client-credential.index'));
            })->name('client-credential.close');
        });

    });

    Route::get('github', function() {
       dd(GitHub::connection('main')->repo()->branches('szana8', 'larascrum'));
    });

});
