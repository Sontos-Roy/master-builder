<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'media_tag_id',
        'image'
    ];
    function media_tag(){
        return $this->belongsTo(Media_Tag::class);
    }
}

