<?php

namespace App\Services;

use App\Models\IssueTypeSchema;
use Illuminate\Support\Collection;

class IssueTypeSchemaService
{
    /**
     * Get all issue type schema with all the connected
     * issue type.
     */
    public function issueTypeSchemas(): ?Collection
    {
        return IssueTypeSchema::with('types')->get();
    }

    /**
     * Create a new issue type schema with and assign the
     * list of the issue types given.
     */
    public function create(array $validatedRequest): array
    {
        return IssueTypeSchema::create([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
        ])->types()->sync($validatedRequest['issueTypes']);
    }

    /**
     * Update an existing issue type schema and sync the
     * list of the assigned issue types.
     */
    public function update(array $validatedRequest, IssueTypeSchema $issueTypeSchema): IssueTypeSchema
    {
        $issueTypeSchema->update([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
        ]);

        // Sync the issue types to keep it updated.
        $issueTypeSchema->types()->sync($validatedRequest['issueTypes']);

        return $issueTypeSchema;
    }

    /**
     * Delete an existing issue type schema and remove the link
     * between the schema and issue types.
     */
    public function delete(IssueTypeSchema $issueTypeSchema): bool
    {
        // First we need to remove the connection
        $issueTypeSchema->types()->sync([]);

        return $issueTypeSchema->delete();
    }
}
