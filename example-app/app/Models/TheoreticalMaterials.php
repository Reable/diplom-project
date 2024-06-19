<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheoreticalMaterials extends Model
{
    use HasFactory;

    protected $fillable = ["training_session_id", "title", "path_url"];
}
