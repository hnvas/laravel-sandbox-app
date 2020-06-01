<?php

namespace Tests\Unit\App\Models;

use App\Models\Account;
use App\Models\Kinds\AccountKind;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;


class AccountTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testAccountDataBaseHasExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('accounts', [
                "id",
                "name",
                "balance",
                "kind",
                "owner_id",
                "created_at",
                "updated_at"
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

/*    public function testAccountHasManyTransactions()
    {
        $account = new Account();

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\HasMany',
            $account->transactions()
        );

        $this->assertInstanceOf(
            'App\Models\Transaction',
            $account->transactions()->getModel()
        );
    }*/

    public function testSetOwnerAttribute()
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
        $kindValue = AccountKind::CHECKING;

        $account = new Account();
        $account->kind = new AccountKind($kindValue);

        $this->assertInstanceOf(AccountKind::class, $account->kind);
        $this->assertEquals(AccountKind::CHECKING, $account->kind->getValue());
    }
}
