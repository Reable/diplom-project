<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $fillable = ["code", "title", "training_session_ids"];

    protected $casts = [
        "training_session_ids" => "array"
    ];
}
