<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Issue extends Model
{
    use HasFactory;

    /**
     * The relationships to always eager-load.
     */
    protected $with = ['reporter', 'assignee', 'project', 'type'];

    /**
     * Mass assignment protection.
     */
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     */
    protected $appends = [];

    /**
     * Every issue has to be a reporter.
     */
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Every issue can be a assignee.
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Every issue belongs to a project.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Every issue belongs to a type.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(IssueType::class, 'issue_type_id');
    }
}
