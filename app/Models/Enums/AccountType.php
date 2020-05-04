<?php


namespace App\Models\Enums;

use MyCLabs\Enum\Enum;

class AccountType extends Enum
{
    CONST CHECKING = 'checking';
    CONST SAVING  = 'saving';
    CONST WALLET  = 'wallet';
}