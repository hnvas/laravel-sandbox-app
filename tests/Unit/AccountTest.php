<?php

namespace Tests\Unit;

use App\Models\Account;
use DomainException;
use Tests\TestCase;
use UnexpectedValueException;


class AccountTest extends TestCase
{

    public function testInvalidAccountTypeShouldThrowAnException()
    {
        $this->expectException(UnexpectedValueException::class);

        new Account(['type' => 'wrong']);
    }

    public function testBalanceLessThanAccountSpecialLimitShouldThrownAnException()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Special limit of account has been exceeded');

        new Account([
            'balance' => -1,
            'special_limit' => 0,
        ]);
    }
}
