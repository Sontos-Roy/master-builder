<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValues extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'value_des',
        'icon'
    ];

    protected $table = "corevalues";
}
