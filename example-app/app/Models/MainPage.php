<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    use HasFactory;

    protected $table  = 'main_page';

    protected $fillable = [
        'main_info', 'main_image',
        'methodical_works_show', 'methodical_works_ids',
        'photo_gallery_show', 'photo_gallery_paths',
        'certificates_show', 'certificates_ids',
    ];

    protected $casts = [
        'methodical_works_ids' => 'array',
        'photo_gallery_paths' => 'array',
        'certificates_ids' => 'array',
    ];
}
