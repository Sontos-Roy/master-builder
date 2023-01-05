<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'class_id'
    ];
}
