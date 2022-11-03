<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Auth;
use Inertia\Inertia;
use Laravel\Passport\ClientRepository;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Roadmap');
    }

    public function reports()
    {
        return Inertia::render('Reports', []);
    }

    public function backlog()
    {
        return Inertia::render('Backlog', []);
    }

    public function boards()
    {
        return Inertia::render('Boards', []);
    }
}
