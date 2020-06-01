<?php

namespace Tests\Unit\App\Models\Payment;

use App\Models\Account;
use App\Models\Payment\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testPaymentMethodsDataBaseHasExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('payment_methods', [
                "id",
                "type",
                "limit",
                "account_id",
                "created_at",
                "updated_at"
            ]));
    }

    public function testPaymentMethodBelongsToAccount()
    {
        $paymentMethod = new PaymentMethod();

        $this->assertInstanceOf(
            '\Illuminate\Database\Eloquent\Relations\BelongsTo',
            $paymentMethod->account()
        );

        $this->assertInstanceOf(
            '\App\Models\Account',
            $paymentMethod->account()->getModel()
        );

    }

    public function setAccountTest()
    {
        $paymentMethod = new PaymentMethod();
        $paymentMethod->account = new Account();

        $this->assertInstanceOf(
            '\App\Models\Account',
            $paymentMethod->account
        );
    }
}
