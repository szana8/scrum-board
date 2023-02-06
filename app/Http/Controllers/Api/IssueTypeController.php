<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IssueType\CreateIssueType;
use App\Http\Requests\IssueType\UpdateIssueType;
use App\Http\Resources\IssueType\IssueTypeResource;
use App\Models\IssueType;
use App\Services\IssueTypeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IssueTypeController extends Controller
{
    public function __construct(
        private readonly IssueTypeService $issueTypeService
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return IssueTypeResource::collection(
            $this->issueTypeService->issueTypes()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateIssueType  $request
     * @return IssueTypeResource
     */
    public function store(CreateIssueType $request): IssueTypeResource
    {
        return new IssueTypeResource(
            $this->issueTypeService->create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  IssueType  $issueType
     * @return IssueTypeResource
     */
    public function show(IssueType $issueType): IssueTypeResource
    {
        return new IssueTypeResource($issueType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateIssueType  $request
     * @param  IssueType  $issueType
     * @return IssueTypeResource
     */
    public function update(UpdateIssueType $request, IssueType $issueType)
    {
        return new IssueTypeResource(
            $this->issueTypeService->update($issueType, $request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  IssueType  $issueType
     * @return bool
     */
    public function destroy(IssueType $issueType)
    {
        return $this->issueTypeService->delete($issueType);
    }
}
