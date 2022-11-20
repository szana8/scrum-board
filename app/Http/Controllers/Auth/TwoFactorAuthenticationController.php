<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorAuthenticationController extends Controller
{
    /**
     * The two-factor authentication provider.
     *
     */
    protected $provider;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(Google2FA $provider)
    {
        $this->provider = $provider;
    }


    /**
     * Display the login view.
     *
     */
    public function store()
    {
        $user = Auth::user();

        $user->forceFill([
            'two_factor_secret' => encrypt($this->provider->generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return Str::random(10).'-'.Str::random(10);
            })->all())),
        ])->save();

        return back()->with('status', 'two-factor-authentication-enabled');
    }

    public function show()
    {
        if (is_null(Auth::user()->two_factor_secret)) {
            return [];
        }

        return response()->json([
            'svg' => $this->twoFactorQrCodeSvg(),
            'url' => $this->twoFactorQrCodeUrl(),
            'setupKey' => decrypt(Auth::user()->two_factor_secret),
        ]);
    }

    private function twoFactorQrCodeSvg()
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(192, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd()
            )
        ))->writeString($this->twoFactorQrCodeUrl());

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    private function twoFactorQrCodeUrl()
    {
        return $this->provider->getQRCodeUrl(
            config('app.name'),
            Auth::user()->name,
            decrypt(Auth::user()->two_factor_secret)
        );
    }
}
