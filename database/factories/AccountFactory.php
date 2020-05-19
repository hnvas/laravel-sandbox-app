<?php

use App\Models\Account;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Account::class, function (Faker $faker) {

    $owner = factory(User::class)->create();

    return [
        'name'           => 'Test account',
        'balance'        => $faker->randomFloat(2, 0, 10000),
        'special_limit'  => $faker->randomFloat(2, 0, 1000),
        'owner'          => $owner
    ];
});
