<?php


namespace App\Helpers;

use Cknow\Money\Money;

/**
 * Class Transform
 * @package App\Helpers
 */
class Transform
{
    /**
     * @param null $value
     * @param string $currency
     *
     * @return int
     */
    public static function moneyToInt($value = null, $currency = 'USD'): int
    {
        if (empty($value)) return 0;

        return (int)Money::parseByDecimal($value, $currency)->getAmount();
    }
}