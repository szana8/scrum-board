<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\IssueTypeSchema\CreateIssueTypeSchema;
use App\Models\IssueTypeSchema;
use App\Services\IssueTypeSchemaService;
use App\Services\IssueTypeService;
use Inertia\Inertia;

class IssueTypeSchemaController extends Controller
{
    public function __construct(
        readonly private IssueTypeService $issueTypeService,
        readonly private IssueTypeSchemaService $issueTypeSchemaService,
    ) {
    }

    public function index()
    {
        return Inertia::render('Settings/Tabs/IssueTypeSchemes', [
            'issueTypes' => fn () => $this->issueTypeService->issueTypes(),
            'issueTypeSchemes' => fn () => $this->issueTypeSchemaService->issueTypeSchemas(),
        ]);
    }

    public function store(CreateIssueTypeSchema $request)
    {
        $this->issueTypeSchemaService->create($request->validated());

        return back(303);
    }

    public function update(CreateIssueTypeSchema $request, IssueTypeSchema $issueTypeSchema)
    {
        $this->issueTypeSchemaService->update($request->validated(), $issueTypeSchema);

        return back(303);
    }

    public function destroy(IssueTypeSchema $issueTypeSchema)
    {
        $this->issueTypeSchemaService->delete($issueTypeSchema);

        return back(303);
    }
}
