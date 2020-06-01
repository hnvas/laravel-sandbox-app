<?php


namespace App\Models;

use Spatie\Tags\Tag as SpatieTag;

/**
 * Class Tag
 * @package App\Models
 * @property string $name
 * @property string $type
 * @property string $slug
 */
class Tag extends SpatieTag
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'slug'
    ];
}