<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'sec_name',
        'sec_title',
        'sec_des',
        'sec_des2',
        'section_image'
    ];
}
