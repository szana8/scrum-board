<?php

namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use App\Services\IssueService;
use Illuminate\Http\Request;
use Inertia\Inertia;


class IssueController extends Controller
{
    public function __construct(private readonly IssueService $issueService)
    {
    }

    public function index(Request $request)
    {
        $issues = $this->issueService->getIssueByProject($request->project);

        return Inertia::render('Issue/Issue', [
            'issues' => $issues,
        ]);
    }
}
