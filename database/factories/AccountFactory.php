<?php

use App\Models\Account;
use App\Models\Kinds\AccountKind;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Account::class, function (Faker $faker) {

    $owner = factory(User::class)->create();
    $kind = strtolower(array_rand(AccountKind::values(), 1));

    return [
        'name'     => 'Test account',
        'balance'  => $faker->randomNumber(),
        'kind'     => new AccountKind($kind),
        'owner_id' => $owner
    ];
});
