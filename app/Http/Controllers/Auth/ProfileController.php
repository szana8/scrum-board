<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the login view.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Profile/Profile', [
            'requiresConfirmation' => true,
            'passwordConfirmed' => false,
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        return back(303);
    }
}
