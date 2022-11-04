<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($attributes) {
            $attributes->slug = \Str::slug($attributes->name);
        });
    }

    public function schemas()
    {
        return $this->belongsToMany(IssueTypeSchema::class);
    }
}
