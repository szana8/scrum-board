<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProject;
use App\Http\Requests\Project\UpdateProject;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    public function __construct(private readonly ProjectService $projectService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResource::collection($this->projectService->projects());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProject  $request
     * @return ProjectResource
     */
    public function store(CreateProject $request)
    {
        return new ProjectResource(
            $this->projectService->create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return ProjectResource
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProject  $request
     * @param  Project  $project
     * @return ProjectResource
     */
    public function update(UpdateProject $request, Project $project)
    {
        return new ProjectResource(
            $this->projectService->update($project, $request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return bool
     */
    public function destroy(Project $project)
    {
        return $this->projectService->delete($project);
    }
}
