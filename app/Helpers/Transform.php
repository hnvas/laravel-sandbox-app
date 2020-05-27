<?php


namespace App\Helpers;


use Cknow\Money\Money;
use Illuminate\Support\Str;

class Transform
{
    public static function classBaseNameToSnakeCase($classOrObject)
    {
        return Str::snake(class_basename($classOrObject));
    }

    public static function moneyToInt($value = null, $currency = 'USD')
    {
        if (empty($value)) $value = '0';

        return (int)Money::parseByDecimal($value, $currency)->getAmount();
    }
}