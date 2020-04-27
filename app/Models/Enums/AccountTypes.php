<?php


namespace App\Models\Enums;

use MyCLabs\Enum\Enum;

class AccountTypes extends Enum
{
    CONST CURRENT = 'current';
    CONST SAVING  = 'saving';
    CONST WALLET  = 'wallet';
}