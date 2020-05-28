<?php


namespace App\Helpers;

use Cknow\Money\Money;

class Transform
{
    public static function moneyToInt($value = null, $currency = 'USD')
    {
        if (empty($value)) $value = '0';

        return (int)Money::parseByDecimal($value, $currency)->getAmount();
    }
}