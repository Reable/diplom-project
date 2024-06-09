<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodicalWorks extends Model
{
    use HasFactory;

    protected $fillable = ["title", "show", "groups_ids"];

    protected $casts = [
        'groups_ids' => 'array',
    ];
}
