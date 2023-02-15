<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\IssueType\CreateIssueType;
use App\Http\Requests\IssueType\UpdateIssueType;
use App\Models\IssueType;
use App\Services\IssueTypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class IssueTypeController extends Controller
{
    public function __construct(
        private readonly IssueTypeService $issueTypeService
    ) {
    }

    /**
     * Render the main issue type page with icons and already
     * exists issue types.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Settings/Tabs/IssueTypes', [
            'icons' => $this->issueTypeService->getIcons(),
            'issueTypes' => $this->issueTypeService->issueTypes()
        ]);
    }

    /**
     * Store a new instance in the database.
     *
     * @param CreateIssueType $request
     * @return RedirectResponse
     */
    public function store(CreateIssueType $request): RedirectResponse
    {
        $this->issueTypeService->create($request->validated());

        return redirect()->back(303);
    }

    /**
     * Update an existing instance in the database.
     *
     * @param UpdateIssueType $request
     * @param IssueType $issueType
     * @return RedirectResponse
     */
    public function update(UpdateIssueType $request, IssueType $issueType): RedirectResponse
    {
        $this->issueTypeService->update($issueType, $request->validated());

        return redirect()->back(303);
    }

    /**
     * Destroy an existing instance from the database.
     *
     * @param IssueType $issueType
     * @return RedirectResponse
     */
    public function destroy(IssueType $issueType): RedirectResponse
    {
        $this->issueTypeService->delete($issueType);

        return back(303);
    }
}
