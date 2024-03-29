<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(
            UpdateUserProfileInformation::class
        );
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by(
                $request->session()->get('login.id')
            );
        });

        Fortify::registerView(fn () => Inertia::render('Auth/Register'));
        Fortify::loginView(fn () => Inertia::render('Auth/Login'));
        Fortify::verifyEmailView(fn () => Inertia::render('Auth/EmailVerify'));
        Fortify::requestPasswordResetLinkView(
            fn () => Inertia::render('Auth/ForgotPassword')
        );
        Fortify::resetPasswordView(
            fn ($request) => Inertia::render('Auth/ResetPassword', [
                'email' => $request->email,
            ])
        );
        Fortify::twoFactorChallengeView(
            fn ($request) => Inertia::render('Auth/TwoFactorChallengeView')
        );
    }
}
