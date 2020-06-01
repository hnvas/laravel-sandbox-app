<?php

namespace App\Models\Payment;

use Parental\HasParent;

/**
 * Class CreditCard
 * @package App\Models
 * @property \App\Models\Account $account
 * @property int $account_id
 * @property int $limit
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
}
