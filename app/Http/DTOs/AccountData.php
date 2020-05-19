<?php


namespace App\Http\DTOs;

use App\Helpers\Translate;
use App\Http\Requests\SaveAccount;
use App\Models\Kinds\AccountKind;
use App\Models\User;
use Cknow\Money\Money;
use Spatie\DataTransferObject\DataTransferObject;

class AccountData extends DataTransferObject
{

    /** @var string */
    public $name;

    /** @var int */
    public $balance;

    /** @var \App\Models\Kinds\AccountKind */
    public $kind;

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
            'balance'       => Translate::moneyToInt($request->input('balance')),
            'kind'          => new AccountKind(strtolower($request->input('kind'))),
            'owner'         => User::find($request->input('owner_id'))
        ]);
    }
}