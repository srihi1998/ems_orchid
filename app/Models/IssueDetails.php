<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'short_desc',
        'desc',
        'user_id',
    ];
}
