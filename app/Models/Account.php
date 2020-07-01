<?php

namespace App\Models;

use App\Models\Kinds\AccountKind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Account
 * @package App\Models
 * @property string $name
 * @property int $balance
 * @property \App\Models\Kinds\AccountKind|null $kind
 * @property \App\Models\User $owner
 * @property int $owner_id
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

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */

    public function incrementBalance(int $value)
    {
        $this->balance += $value;
    }

    public function reduceBalance($value)
    {
        $this->balance -= $value;
    }
}
