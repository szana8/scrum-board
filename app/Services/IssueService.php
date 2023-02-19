<?php

namespace App\Services;

use App\Models\Issue;

class IssueService
{
    public function getIssueByProject(int $project)
    {
        return Issue::where('project_id', $project)->get();
    }
}
