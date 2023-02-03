<?php

namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class IssueModalController extends Controller
{
    public function create()
    {
        return Inertia::dialog('Issue/CreateIssueInModal')
            ->with([])
            ->baseRoute('web.roadmap.index');
    }
}
