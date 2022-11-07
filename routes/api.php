<?php

use App\Http\Controllers\Api\IssueTypeController;
use App\Http\Controllers\Api\ProjectController;
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

    Route::get('projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('projects/{project:slug}', [ProjectController::class, 'show'])->name('project.show');
    Route::post('projects', [ProjectController::class, 'store'])->name('project.store');
    Route::put('projects/{project:slug}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('projects/{project:slug}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('issue-types', [IssueTypeController::class, 'index'])->name('issue-type.index');
    Route::get('issue-types/{issueType:slug}', [IssueTypeController::class, 'show'])->name('issue-type.show');
    Route::post('issue-types', [IssueTypeController::class, 'store'])->name('issue-type.store');
    Route::put('issue-types/{issueType:slug}', [IssueTypeController::class, 'update'])->name('issue-type.update');
    Route::delete('issue-types/{issueType:slug}', [IssueTypeController::class, 'destroy'])->name('issue-type.destroy');
});
