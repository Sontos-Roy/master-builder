<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footerBar extends Model
{
    use HasFactory;

    protected $fillable = [
        'co_office',
        're_office',
        'office_time'
    ];
}
