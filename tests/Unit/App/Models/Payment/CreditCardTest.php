<?php

namespace Tests\Unit\App\Models\Payment;

use App\Models\Payment\CreditCard;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreditCardTest extends TestCase
{

    use WithFaker;

    public function testSetLimit()
    {
        $limit = $this->faker->randomNumber(5);

        $creditCard = new CreditCard();
        $creditCard->limit = $limit;

        $this->assertEquals($limit, $creditCard->limit);
    }

    public function testIncrementLimit()
    {
        $limit = $this->faker->randomNumber(5);
        $value = $this->faker->randomNumber(5);

        $creditCard = new CreditCard();
        $creditCard->current_limit = $limit;

        $creditCard->incrementCurrentLimit($value);

        $this->assertEquals($limit + $value, $creditCard->current_limit);
    }

    public function testReduceLimit()
    {
        $limit = $this->faker->randomNumber(5);
        $value = $this->faker->randomNumber(5);

        $creditCard = new CreditCard();
        $creditCard->current_limit = $limit;

        $creditCard->reduceCurrentLimit($value);

        $this->assertEquals($limit - $value, $creditCard->current_limit);
    }
}