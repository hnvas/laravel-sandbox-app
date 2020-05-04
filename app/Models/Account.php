<?php

namespace App\Models;

use App\Models\Enums\AccountType;
use DomainException;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = [
        'name',
        'balance',
        'special_limit',
        'type',
        'owner',
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

    public function sourceTransactions()
    {
        return $this->morphMany(Transaction::class, 'source');
    }

    public function destinationTransactions()
    {
        return $this->morphMany(Transaction::class, 'destination');
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
        $type = new AccountType(strtolower($value));

        $this->attributes['type'] = $type->getValue();
    }

    public function setOwnerAttribute(User $owner)
    {
        $this->owner()->associate($owner);
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
