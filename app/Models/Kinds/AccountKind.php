<?php


namespace App\Models\Kinds;

use MyCLabs\Enum\Enum;

class AccountKind extends Enum
{
    const CHECKING = 'checking';
    const SAVING = 'saving';
    const WALLET = 'wallet';
}