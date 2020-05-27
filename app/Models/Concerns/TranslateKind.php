<?php


namespace App\Models\Concerns;


use App\Helpers\Transform;

trait TranslateKind
{

    public static function translate()
    {
        $enumClass = Transform::classBaseNameToSnakeCase(self::class);

        return array_map(function ($value) use ($enumClass) {
            return trans("enumerations.$enumClass.$value");
        }, static::values());
    }
}