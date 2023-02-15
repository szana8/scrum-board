<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class IssueTypeSchema extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'description'];

    /**
     * The relationships to always eager-load.
     */
    protected $with = ['types'];

    /**
     * Adding the appends value will call the accessor in the JSON response
     */
    protected $appends = ['type_ids'];

    /**
     * A schema belongs to many types.
     */
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(IssueType::class);
    }

    public function getTypeIdsAttribute(): Collection
    {
        return $this->types->pluck('id');
    }
}
