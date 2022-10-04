<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectService
{
    public function projects(): ?Collection
    {
        return Project::with('owner')->get();
    }

    public function create(array $validatedRequest): Project
    {
        return Project::create(
            array_merge(
                $validatedRequest,
                ['owner_id' => \Auth::user()->id]
            )
        );
    }

    public function update(Project $project, array $validatedRequest): Project
    {
        $project->update($validatedRequest);

        return $project->refresh();
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
