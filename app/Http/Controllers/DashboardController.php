<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    public function settings()
    {
        return Inertia::render('Settings', []);
    }

    public function users()
    {
        return Inertia::render('Users', []);
    }
}
