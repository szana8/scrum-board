<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIssueTypeSchema;
use App\Models\IssueTypeSchema;
use App\Services\IssueTypeService;
use Inertia\Inertia;

class IssueTypeSchemaController extends Controller
{
    public function __construct(readonly private IssueTypeService $issueTypeService)
    {
    }

    public function index()
    {
        return Inertia::render('Settings/IssueTypeSchemes', [
            'issueTypes' => $this->issueTypeService->issueTypes(),
            'issueTypeSchemes' => IssueTypeSchema::all(),
        ]);
    }

    public function store(CreateIssueTypeSchema $request)
    {
        IssueTypeSchema::create([
            'name' => $request->name,
            'description' => $request->description,
        ])->types()->sync($request->issueTypes);

        return back(303);
    }

    public function destroy(IssueTypeSchema $issueTypeSchema)
    {
        $issueTypeSchema->types()->sync([]);
        $issueTypeSchema->delete();

        return back(303);
    }
}
