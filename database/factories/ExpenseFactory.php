<?php

use App\Models\Expense;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Expense::class, function (Faker $faker) {
    return [
        'amount'      => $faker->randomNumber(5),
        'fine'        => $faker->randomNumber(5),
        'discount'    => $faker->randomNumber(5),
        'description' => 'Expense test creation',
        'due_date'    => $faker->date(),
        'issue_date'  => $faker->date(),
        'tags'        => [$faker->word()]
    ];
});
