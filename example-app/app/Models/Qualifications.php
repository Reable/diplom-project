<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    use HasFactory;

    public $fillable = [
        "order",
        "year",
        "type",
        "number_document",
        "title",
        "hours_date",
        "path_url",
    ];
}
