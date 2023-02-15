<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IssueType extends Model
{
    use HasFactory;

    /**
     * Mass assignment protection.
     */
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($attributes) {
            $attributes->slug = \Str::slug($attributes->name);
        });
    }

    /**
     * An Issue Type can belong to many schema.
     *
     * @return BelongsToMany
     */
    public function schemas(): BelongsToMany
    {
        return $this->belongsToMany(IssueTypeSchema::class);
    }
}
