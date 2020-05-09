<?php


namespace App\Http\DTOs;

use App\Http\Requests\SaveAccount;
use App\Models\Types\AccountType;
use App\Models\User;
use Cknow\Money\Money;
use Spatie\DataTransferObject\DataTransferObject;

class AccountData extends DataTransferObject
{

    /** @var string */
    public $name;

    /** @var int */
    public $balance;

    /** @var int */
    public $special_limit;

    /** @var \App\Models\Types\AccountType */
    public $type;

    /** @var \App\Models\User */
    public $owner;

    /**
     * @param \App\Http\Requests\SaveAccount $request
     *
     * @return static
     */
    public static function fromRequest(SaveAccount $request): self
    {
        return new self([
            'name'          => $request->input('name'),
            'balance'       => (int) Money::parseByDecimal($request->input('balance'), 'USD')->getAmount(),
            'special_limit' => (int) Money::parseByDecimal($request->input('special_limit'), 'USD')->getAmount(),
            'type'          => new AccountType(strtolower($request->input('type'))),
            'owner'         => User::find($request->input('owner_id'))
        ]);
    }
}