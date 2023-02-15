<?php

namespace App\Services;

use App\Models\IssueType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IssueTypeService
{
    /**
     * Get all the issue types from the database.
     */
    public function issueTypes(): ?Collection
    {
        return IssueType::all();
    }

    /**
     * Create a new issue type instance in the database.
     */
    public function create(array $validatedRequest): IssueType
    {
        return IssueType::create($validatedRequest);
    }

    /**
     * Update an existing issue type instance in the database.
     */
    public function update(IssueType $issueType, array $validatedRequest): IssueType
    {
        $issueType->update($validatedRequest);

        return $issueType->refresh();
    }

    /**
     * Delete an existing issue type instance from the database.
     */
    public function delete(IssueType $issueType): bool
    {
        return $issueType->delete();
    }

    /**
     * Transform the issue type icon list to collection for the dropdown
     * vue component.
     */
    public function getIcons(): Collection
    {
        return collect(Storage::allFiles('public/icons/issue_types'))->map(function ($item) {
            return [
                'name' => Str::substr(basename($item), 0, -4),
                'icon' => $item
            ];
        });
    }
}
