<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSessions extends Model
{
    use HasFactory;

    protected $fillable = ["title", "group_title", "group_id"];
}
