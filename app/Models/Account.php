<?php

namespace App\Models;

use App\Models\Kinds\AccountKind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Account
 * @package App\Models
 */
class Account extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'balance',
        'kind',
        'owner',
        'owner_id'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'account_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */

    /**
     * @param \App\Models\Kinds\AccountKind $type
     */
    public function setKindAttribute(AccountKind $type): void
    {
        $this->attributes['kind'] = $type->getValue();
    }

    /**
     * @param \App\Models\User $owner
     */
    public function setOwnerAttribute(User $owner): void
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
     * @return \App\Models\Kinds\AccountKind
     */
    public function getKindAttribute($value): ?AccountKind
    {
        if (empty($value)) return null;

        return new AccountKind($value);
    }
}
