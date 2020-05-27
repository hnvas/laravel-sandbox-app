<?php


namespace App\Models\Kinds;

use App\Models\Concerns\TranslateKind;
use MyCLabs\Enum\Enum;

class AccountKind extends Enum
{

    use TranslateKind;

    const CHECKING = 'checking';
    const SAVING = 'saving';
    const WALLET = 'wallet';
}