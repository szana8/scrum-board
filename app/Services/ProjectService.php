<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectService
{
    /**
     * Get all the projects from the database.
     */
    public function projects(): ?Collection
    {
        return Project::with('owner')->get();
    }

    /**
     * Create a new project instance in the database.
     */
    public function create(array $validatedRequest): Project
    {
        return Project::create(
            array_merge($validatedRequest, ['owner_id' => \Auth::user()->id])
        );
    }

    /**
     * Update an existing project instance in the database.
     */
    public function update(Project $project, array $validatedRequest): Project
    {
        $project->update($validatedRequest);

        return $project->refresh();
    }

    /**
     * Delete an existing project instance from the database.
     */
    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
