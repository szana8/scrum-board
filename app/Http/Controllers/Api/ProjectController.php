<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProject;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function __construct(readonly private ProjectService $projectService)
    { }

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
     * @param CreateProject $request
     * @return ProjectResource
     */
    public function store(CreateProject $request)
    {
        return new ProjectResource($this->projectService->create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return ProjectResource
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return void
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
