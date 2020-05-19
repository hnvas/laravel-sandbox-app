<?php


namespace App\Helpers;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use MyCLabs\Enum\Enum;

class Translate
{

    public static function model($model): object
    {
        $modelClass = Str::snake(class_basename(
            is_object($model) ? get_class($model) : $model
        ));

        return (object)trans("models.$modelClass");
    }

    public static function enum($type): array
    {
        $class = Str::snake(class_basename(
            is_object($type) ? get_class($type) : $type
        ));

        return array_map(function ($value) use ($class) {
            return trans("enumerations.$class.$value");
        }, $type::values());
    }

    public static function moneyToInt($value = null, $currency = 'USD')
    {
        if (empty($value)) $value = '0';

        return (int)Money::parseByDecimal($value, $currency)->getAmount();
    }
}