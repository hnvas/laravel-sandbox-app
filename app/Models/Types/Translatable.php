<?php


namespace App\Models\Types;

use Illuminate\Support\Str;

trait Translatable
{
    public static function transValues()
    {
        $class = Str::snake(class_basename(get_called_class()));

        return array_map(function ($value) use ($class) {
            return trans("enumerations.$class.$value");
        }, static::values());
    }
}