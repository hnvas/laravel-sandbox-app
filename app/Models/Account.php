<?php

namespace App\Models;

use App\Models\Types\AccountType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function sourceTransactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'source');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function destinationTransactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'destination');
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    /**
     * @param int $value
     *
     * @throws \UnexpectedValueException
     */
    public function setBalanceAttribute(int $value)
    {
        $this->attributes['balance'] = $value;

        if ($this->invalidBalance()) {
            throw new UnexpectedValueException('Special limit of account has been exceeded');
        }
    }

    /**
     * @param \App\Models\Types\AccountType $type
     */
    public function setTypeAttribute(AccountType $type)
    {
        $this->attributes['type'] = $type->getValue();
    }

    /**
     * @param \App\Models\User $owner
     */
    public function setOwnerAttribute(User $owner)
    {
        $this->owner()->associate($owner);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * @param $value
     *
     * @return \App\Models\Types\AccountType
     */
    public function getTypeAttribute($value): AccountType
    {
        if ($value) {
            return new AccountType($value);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Instance methods
    |--------------------------------------------------------------------------
    */

    /**
     * Compares account special limit with current balance
     *
     * @return bool
     */
    private function invalidBalance(): bool
    {
        return $this->balance < ($this->special_limit * -1);
    }
}
