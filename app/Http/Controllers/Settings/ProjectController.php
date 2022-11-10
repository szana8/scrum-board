<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProject;
use App\Http\Resources\Project\ProjectResource;
use App\Models\User;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class ProjectController extends Controller
{
    public function __construct(readonly private ProjectService $projectService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Settings/Tabs/Projects', [
            'users' => User::all(),
            'avatars' => Storage::allFiles('public/icons/project/avatars'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Modal
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProject  $request
     * @return ProjectResource
     */
    public function store(CreateProject $request)
    {
        $this->projectService->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
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
