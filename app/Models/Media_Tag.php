<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    function media(){
        return $this->hasMany(Media::class);
    }
}
