<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flatDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'total_area',
        'total_floor',
        'parking_lot',
        'social_area'
    ];
}
