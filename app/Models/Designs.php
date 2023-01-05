<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designs extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'room_size',
        'room_design'
        
    ];
}
