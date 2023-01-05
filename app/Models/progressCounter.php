<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progressCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'progress_title',
        'no_of_progress',
        'progress_icon'
    ];
}
