<?php


namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use MyCLabs\Enum\Enum;

class Translate
{

    public static function model(Model $model)
    {
       $modelClass = Str::snake(class_basename(
           is_object($model) ? get_class($model) : $model
       ));

       return (object) trans("models.$modelClass");
    }

    public static function enum(Enum $type)
    {
        $class = Str::snake(class_basename(get_class($type)));

        return array_map(function ($value) use ($class) {
            return trans("enumerations.$class.$value");
        }, $type->values());
    }
}