<?php

namespace App\Actions;

use App\Helpers\RecoveryCode;
use App\Models\User;
use Illuminate\Support\Collection;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use PragmaRX\Google2FA\Google2FA;

class EnableTwoFactorAuthentication
{
    /**
     * Create a new action instance.
     *
     * @param Google2FA $provider
     */
    public function __construct(private Google2FA $provider)
    {

    }

    /**
     * Enable two-factor authentication for the user.
     *
     * @param mixed $user
     * @return void
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function __invoke(User $user): void
    {
        $user->forceFill([
            'two_factor_secret' => encrypt($this->provider->generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
        ])->save();
    }
}
