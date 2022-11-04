<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Settings\ClientCredentialController;
use App\Http\Controllers\Settings\GitTokenController;
use App\Http\Controllers\Settings\IssueTypeController;
use App\Http\Controllers\Settings\IssueTypeSchemaController;
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

    Route::prefix('settings')->group(function () {
        Route::prefix('client-credential')->group(function () {
            Route::get('', [ClientCredentialController::class, 'index'])->name('client-credential.index');
            Route::post('', [ClientCredentialController::class, 'store'])->name('client-credential.store');
            Route::get('popup/{client}', [ClientCredentialController::class, 'popup'])->name('client-credential.popup');
            Route::delete('/{client}', [ClientCredentialController::class, 'destroy'])->name('client-credential.destroy');
            Route::get('/close', function () {
                return Inertia::location(\route('client-credential.index'));
            })->name('client-credential.close');
        });

        Route::prefix('git-token')->group(function () {
            Route::get('', [GitTokenController::class, 'index'])->name('web.git-token.index');
            Route::post('', [GitTokenController::class, 'store'])->name('web.git-token.store');
            Route::delete('/{token}', [GitTokenController::class, 'destroy'])->name('web.git-token.destroy');
        });

        Route::prefix('issue-type')->group(function () {
            Route::get('', [IssueTypeController::class, 'index'])->name('web.issue-type.index');
            Route::post('', [IssueTypeController::class, 'store'])->name('web.issue-type.store');
            Route::delete('/{issueType}', [IssueTypeController::class, 'destroy'])->name('web.issue-type.destroy');
        });

        Route::prefix('issue-type-schema')->group(function () {
            Route::get('', [IssueTypeSchemaController::class, 'index'])->name('web.issue-type-schema.index');
            Route::post('', [IssueTypeSchemaController::class, 'store'])->name('web.issue-type-schema.store');
            Route::delete('/{issueTypeSchema}', [IssueTypeSchemaController::class, 'destroy'])->name('web.issue-type-schema.destroy');
        });
    });

    Route::get('github', function () {
        dd(GitHub::connection('main')->me()->show());
    });
});
