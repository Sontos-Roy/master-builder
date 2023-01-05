<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frontpageCover extends Model
{
    use HasFactory;


    protected $fillable = [
        'page_name',
        'cover_title',
        'cover_des',
        'cover_des2',
        'background_image'
    ];
    
}
