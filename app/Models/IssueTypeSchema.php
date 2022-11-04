<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IssueTypeSchema extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['types'];

    /**
     * A schema belongs to many types.
     *
     */
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(IssueType::class);
    }
}
