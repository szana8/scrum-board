<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PasswordConfirmationController extends Controller
{
    public function index()
    {
        return Inertia::modal('Profile/Partials/PasswordConfirmationModal')
            ->baseURL(route('profile.index'));
    }
}
