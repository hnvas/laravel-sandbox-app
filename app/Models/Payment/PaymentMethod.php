<?php

namespace App\Models\Payment;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * @package App\Models
 * @property \App\Models\Account $account
 * @property int $account_id
 * @property-read string $type
 */
class PaymentMethod extends Model
{

    protected $table = 'payment_method';

    /**
     * @var string[]
     */
    protected $fillable  = [
        'account',
        'account_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    /**
     * @param \App\Models\Account $account
     */
    public function setAccountAttribute(Account $account)
    {
        $this->account()->associate($account);
    }
}
