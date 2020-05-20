<?php

use App\Models\Expense;
use App\Models\Tag;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Expense::class, function (Faker $faker) {
    return [
        'amount'      => $faker->randomNumber(5),
        'description' => 'Expense test creation',
        'due_date'    => new Carbon($faker->date()),
        'issue_date'  => new Carbon($faker->date()),
        'tags'        => ['Test']
    ];
});
