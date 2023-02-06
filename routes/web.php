<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Settings\ClientCredentialController;
use App\Http\Controllers\Settings\GitTokenController;
use App\Http\Controllers\Settings\IssueTypeController;
use App\Http\Controllers\Settings\IssueTypeSchemaController;
use App\Http\Controllers\Settings\ProjectController;
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

Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::redirect('/', '/roadmap');
    Route::get('/roadmap', [DashboardController::class, 'index'])->name(
        'web.roadmap.index'
    );
    Route::get('/board', [DashboardController::class, 'boards'])->name(
        'web.boards.index'
    );
    Route::get('/backlog', [DashboardController::class, 'backlog'])->name(
        'web.backlog.index'
    );
    Route::get('/reports', [DashboardController::class, 'reports'])->name(
        'web.reports.index'
    );

    Route::prefix('settings')->group(function () {
        Route::prefix('client-credential')->group(function () {
            Route::get('', [ClientCredentialController::class, 'index'])->name(
                'web.client-credential.index'
            );
            Route::post('', [ClientCredentialController::class, 'store'])->name(
                'web.client-credential.store'
            );
            Route::get('popup/{client}', [
                ClientCredentialController::class,
                'popup',
            ])->name('web.client-credential.popup');
            Route::delete('/{client}', [
                ClientCredentialController::class,
                'destroy',
            ])->name('web.client-credential.destroy');
            Route::get('/close', function () {
                return Inertia::location(\route('web.client-credential.index'));
            })->name('web.client-credential.close');
        });

        Route::prefix('git-token')->group(function () {
            Route::get('', [GitTokenController::class, 'index'])->name(
                'web.git-token.index'
            );
            Route::post('', [GitTokenController::class, 'store'])->name(
                'web.git-token.store'
            );
            Route::put('/{token}', [GitTokenController::class, 'update'])->name(
                'web.git-token.update'
            );
            Route::delete('/{token}', [
                GitTokenController::class,
                'destroy',
            ])->name('web.git-token.destroy');
        });

        Route::prefix('issue-type')->group(function () {
            Route::get('', [IssueTypeController::class, 'index'])->name(
                'web.issue-type.index'
            );
            Route::post('', [IssueTypeController::class, 'store'])->name(
                'web.issue-type.store'
            );
            Route::put('/{issueType}', [
                IssueTypeController::class,
                'update',
            ])->name('web.issue-type.update');
            Route::delete('/{issueType}', [
                IssueTypeController::class,
                'destroy',
            ])->name('web.issue-type.destroy');
        });

        Route::prefix('issue-type-schema')->group(function () {
            Route::get('', [IssueTypeSchemaController::class, 'index'])->name(
                'web.issue-type-schema.index'
            );
            Route::post('', [IssueTypeSchemaController::class, 'store'])->name(
                'web.issue-type-schema.store'
            );
            Route::put('/{issueTypeSchema}', [
                IssueTypeSchemaController::class,
                'update',
            ])->name('web.issue-type-schema.update');
            Route::delete('/{issueTypeSchema}', [
                IssueTypeSchemaController::class,
                'destroy',
            ])->name('web.issue-type-schema.destroy');
        });

        Route::prefix('project')->group(function () {
            Route::get('', [ProjectController::class, 'index'])->name(
                'web.project.index'
            );
            Route::post('', [ProjectController::class, 'store'])->name(
                'web.project.store'
            );
            Route::delete('/{project}', [
                ProjectController::class,
                'destroy',
            ])->name('web.project.destroy');
        });

        Route::prefix('profile')->group(function () {
            // Route::get('two-factor-authentication', [\App\Http\Controllers\Auth\TwoFactorAuthenticationController::class, 'index']);
        });

        Route::prefix('issue')->group(function () {
            Route::get('issue-modal', [
                \App\Http\Controllers\Issue\IssueModalController::class,
                'create',
            ])->name('issue.create.modal');
        });
    });

    Route::get('github', function () {
        //$qr = new PragmaRX\Google2FA\Google2FA();
        //return $qr->getQRCodeUrl(1,2,3);
    });
});
