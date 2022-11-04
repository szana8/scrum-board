<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GitToken extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'token', 'user_id'];
}
