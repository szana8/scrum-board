<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\IssueType\CreateIssueType;
use App\Http\Requests\IssueType\UpdateIssueType;
use App\Models\IssueType;
use App\Services\IssueTypeService;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class IssueTypeController extends Controller
{
    public function __construct(
        private readonly IssueTypeService $issueTypeService
    ) {
    }

    public function index()
    {
        return Inertia::render('Settings/Tabs/IssueTypes', [
            'icons' => Storage::allFiles('public/icons/issue_types'),
            'issueTypes' => $this->issueTypeService->issueTypes()
        ]);
    }

    public function store(CreateIssueType $request)
    {
        $this->issueTypeService->create($request->validated());

        return redirect()->back(303);
    }

    public function update(UpdateIssueType $request, IssueType $issueType)
    {
        $this->issueTypeService->update($issueType, $request->validated());

        return redirect()->back(303);
    }

    public function destroy(IssueType $issueType)
    {
        $this->issueTypeService->delete($issueType);

        return back(303);
    }
}
