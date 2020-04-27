<?php

namespace App\Models;

use App\Models\Enums\AccountTypes;
use Cknow\Money\Money;
use DomainException;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = [
        'name',
        'balance',
        'special_limit',
        'type',
        'owner_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = $value;

        $this->checkNegativeLimit();
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = (new AccountTypes($value))->getValue();
    }

    /*
    |--------------------------------------------------------------------------
    | Instance methods
    |--------------------------------------------------------------------------
    */

    /**
     * Compares account special limit with current balance
     */
    private function checkNegativeLimit(): void
    {
        if ($this->balance < ($this->special_limit * -1)) {
            throw new DomainException('Special limit of account has been exceeded');
        }
    }

    /**
     * @param int $value
     * @return int
     */
    public function withdraw(int $value): int
    {
        $this->balance -= $value;

        return $this->balance;
    }

    /**
     * @param int $value
     * @return int
     */
    public function deposit(int $value): int
    {
        $this->balance += $value;

        return $this->balance;
    }
}
