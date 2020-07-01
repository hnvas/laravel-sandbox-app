<?php

namespace App\Models\Payment;

use Parental\HasParent;

/**
 * Class CreditCard
 * @package App\Models
 * @property \App\Models\Account $account
 * @property int $account_id
 * @property int $limit
 * @property int $current_limit
 * @property-read string $type
 */
class CreditCard extends PaymentMethod
{
    use HasParent;

    /**
     * @var string[]
     */
    protected $fillable  = [
        'account',
        'account_id',
        'limit'
    ];

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */

    /**
     * @param $value
     */
    public function reduceCurrentLimit(int $value)
    {
        $this->current_limit -= $value;
    }

    /**
     * @param $value
     */
    public function incrementCurrentLimit(int $value)
    {
        $this->current_limit += $value;
    }

}
