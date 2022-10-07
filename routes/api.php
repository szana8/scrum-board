<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['client'])->prefix('v1')->group(function () {
    Route::get('user', function () {
        return auth()->user();
    });

    Route::get('projects', [\App\Http\Controllers\Api\ProjectController::class, 'index'])->name('project.index');
    Route::get('projects/{project:slug}', [\App\Http\Controllers\Api\ProjectController::class, 'show'])->name('project.show');
    Route::post('projects', [\App\Http\Controllers\Api\ProjectController::class, 'store'])->name('project.store');
    Route::put('projects/{project:slug}', [\App\Http\Controllers\Api\ProjectController::class, 'update'])->name('project.update');
    Route::delete('projects/{project:slug}', [\App\Http\Controllers\Api\ProjectController::class, 'destroy'])->name('project.destroy');
});
