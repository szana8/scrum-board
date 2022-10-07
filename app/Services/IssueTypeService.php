<?php

namespace App\Services;

use App\Models\IssueType;
use Illuminate\Support\Collection;

class IssueTypeService
{
    public function issueTypes(): ?Collection
    {
        return IssueType::all();
    }

    public function create(array $validatedRequest): IssueType
    {
        return IssueType::create($validatedRequest);
    }

    public function update(IssueType $issueType, array $validatedRequest): IssueType
    {
        $issueType->update($validatedRequest);

        return $issueType->refresh();
    }

    public function delete(IssueType $issueType): bool
    {
        return $issueType->delete();
    }
}
