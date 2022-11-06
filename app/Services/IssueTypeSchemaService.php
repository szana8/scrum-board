<?php

namespace App\Services;

use App\Models\IssueTypeSchema;
use Illuminate\Support\Collection;

class IssueTypeSchemaService
{
    public function issueTypeSchemas(): ?Collection
    {
        return IssueTypeSchema::with('types')->get();
    }

    public function create(array $validatedRequest): array
    {
        return IssueTypeSchema::create([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
        ])->types()->sync($validatedRequest['issueTypes']);
    }

    public function update(array $validatedRequest, IssueTypeSchema $issueTypeSchema): IssueTypeSchema
    {
        $issueTypeSchema->update([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
        ]);

        $issueTypeSchema->types()->sync($validatedRequest['issueTypes']);

        return $issueTypeSchema;
    }

    public function delete(IssueTypeSchema $issueTypeSchema): bool
    {
        $issueTypeSchema->types()->sync([]);

        return $issueTypeSchema->delete();
    }
}
