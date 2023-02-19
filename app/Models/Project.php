<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    /**
     * Mass assignment protection.
     */
    protected $guarded = [];

    /**
     * A project has to be an owner.
     *
     * @return HasOne
     */
    public function owner(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    /**
     * A project can have many issues.
     */
    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }
}
