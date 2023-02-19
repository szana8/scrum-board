<?php

namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Services\IssueTypeService;
use Inertia\Inertia;

class IssueModalController extends Controller
{
    public function __construct(private readonly IssueTypeService $issueTypeService)
    {
    }

    public function create()
    {
        return Inertia::dialog('Issue/Modal/CreateIssueModal')
            ->with([
                'issueTypes' => $this->issueTypeService->issueTypes(),
                'projects' => Project::all(),
                'users' => User::all()
            ])
            ->baseRoute('web.roadmap.index');
    }
}
