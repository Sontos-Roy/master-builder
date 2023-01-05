<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuatSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'persor_speech',
        'persor_name',
        'persor_designation',
        'feature_image'
    ];
}
