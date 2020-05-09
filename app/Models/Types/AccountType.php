<?php


namespace App\Models\Types;

use MyCLabs\Enum\Enum;

class AccountType extends Enum
{
    CONST CHECKING = 'checking';
    CONST SAVING  = 'saving';
    CONST WALLET  = 'wallet';
}