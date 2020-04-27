<?php

namespace Tests\Unit;

use App\Models\Account;
use DomainException;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use UnexpectedValueException;

class AccountTest extends TestCase
{

    use WithFaker;

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

    public function testWithdrawShouldDecrementBalance()
    {
        $initialBalance = $this->faker->randomNumber(5);
        $withdrawValue = $initialBalance - 1;

        $account = new Account([
            'balance' => $initialBalance
        ]);

        $account->withdraw($withdrawValue);

        $this->assertEquals(1, $account->balance);
    }

    public function testDepositShouldIncrementBalance()
    {
        $initialBalance = $this->faker->randomNumber(5);
        $depositValue = $this->faker->randomNumber(5);

        $account = new Account([
            'balance' => $initialBalance
        ]);

        $account->deposit($depositValue);

        $this->assertEquals($initialBalance + $depositValue, $account->balance);
    }
}
