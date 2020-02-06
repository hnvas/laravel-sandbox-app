<?php


namespace App\Models\Core;

use Spatie\Tags\Tag as SpatieTag;

class Tag extends SpatieTag
{
    protected $fillable = [
        'name',
        'type'
    ];
}