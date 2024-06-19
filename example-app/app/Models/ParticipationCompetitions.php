<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipationCompetitions extends Model
{
    use HasFactory;

    public $fillable = [
        "order",
        "year",
        "title",
        "competition",
        "position",
        "place_title",
        "album_id",
    ];
}
