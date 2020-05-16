<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\Types\AccountType;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use UnexpectedValueException;


class AccountTest extends TestCase
{

    public function testAccountDataBaseHasExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('accounts', [
                'name',
                'balance',
                'special_limit',
                'type',
                'owner_id',
                'created_at',
                'updated_at'
            ]));
    }

    public function testAccountBelongsToUser()
    {
        $account = new Account();

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\BelongsTo',
            $account->owner()
        );

        $this->assertInstanceOf(
            'App\Models\User',
            $account->owner()->getModel()
        );
    }

    public function testAccountMorphManySourceTransactions()
    {
        $account = new Account();

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\MorphMany',
            $account->sourceTransactions()
        );

        $this->assertInstanceOf(
            'App\Models\Transaction',
            $account->sourceTransactions()->getModel()
        );
    }

    public function testAccountMorphManyDestinationTransactions()
    {
        $account = new Account();

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\MorphMany',
            $account->destinationTransactions()
        );

        $this->assertInstanceOf(
            'App\Models\Transaction',
            $account->destinationTransactions()->getModel()
        );
    }

    public function testInvalidAccountTypeShouldThrowAnException()
    {
        $this->expectException(UnexpectedValueException::class);

        new Account(['type' => new AccountType('wrong')]);
    }

    public function testSetAccountOwnerAttribute()
    {
        $account = new Account();
        $account->owner = new User();

        $this->assertInstanceOf(
            'App\Models\User',
            $account->owner
        );
    }

    public function testSetTypeAttribute()
    {
        $account = new Account();
        $account->type = new AccountType(AccountType::CHECKING);

        $this->assertInstanceOf(AccountType::class, $account->type);
        $this->assertEquals(AccountType::CHECKING, $account->type->getValue());
    }
}
