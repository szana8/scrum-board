<?php

namespace App\Http\Controllers\Auth;

use App\Actions\GenerateNewRecoveryCodes;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecoveryCodeController extends Controller
{

    /**
     * Get the two factor authentication recovery codes for authenticated user.
     *
     * @param  Request  $request
     * @return array|JsonResponse
     */
    public function index(Request $request)
    {
        if (! $request->user()->two_factor_secret ||
            ! $request->user()->two_factor_recovery_codes) {
            return [];
        }

        return response()->json(json_decode(decrypt(
            $request->user()->two_factor_recovery_codes
        ), true));
    }

    /**
     * Generate a fresh set of two factor authentication recovery codes.
     *
     * @param  Request  $request
     * @param  GenerateNewRecoveryCodes  $generate
     */
    public function store(Request $request, GenerateNewRecoveryCodes $generate)
    {
        $generate($request->user());

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back(303);
    }


}
