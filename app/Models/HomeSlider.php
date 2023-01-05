<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_title',
        'cover_des',
        'cover_des2',
        'icon_img',
        'background_image'
    ];
}
