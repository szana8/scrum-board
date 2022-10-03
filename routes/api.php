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

    Route::get('projects', [\App\Http\Controllers\Api\ProjectController::class, 'index']);
    Route::get('projects/{project:slug}', [\App\Http\Controllers\Api\ProjectController::class, 'show']);
    Route::post('projects', [\App\Http\Controllers\Api\ProjectController::class, 'store']);

});
