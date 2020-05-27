<?php


namespace App\Models\Concerns;

use App\Helpers\Transform;

trait TranslateModel
{
    public static function translate(): object
    {
        $modelClass = Transform::classBaseNameToSnakeCase(self::class);

        return (object)trans("models.$modelClass");
    }
}