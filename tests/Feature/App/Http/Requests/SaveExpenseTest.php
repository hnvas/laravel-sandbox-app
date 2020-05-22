<?php


namespace Tests\Feature\App\Http\Requests;


use App\Http\Requests\SaveExpense;
use Faker\Factory;

class SaveExpenseTest extends RequestTestCase
{

    protected function requestForm()
    {
        return SaveExpense::class;
    }

    public function validationProvider(): array
    {
        $faker = Factory::create();

        return [
            'request_should_fail_no_description_is_provided'     => [
                'passed' => false,
                'data'   => [
                    'amount'     => (string)$faker->randomFloat(2),
                    'due_date'   => $faker->date(),
                    'issue_date' => $faker->date(),
                    'tags'       => [$faker->word()]
                ]
            ],
            'request_should_fail_when_no_amount_is_provided'     => [
                'passed' => false,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'due_date'    => $faker->date(),
                    'issue_date'  => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ],
            'request_should_fail_when_no_due_date_is_provided'   => [
                'passed' => false,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'amount'      => (string)$faker->randomFloat(2),
                    'issue_date'  => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ],
            'request_should_fail_when_no_issue_date_is_provided' => [
                'passed' => false,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'amount'      => (string)$faker->randomFloat(2),
                    'due_date'    => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ],
            'request_should_fail_when_no_tags_is_provided'       => [
                'passed' => false,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'amount'      => (string)$faker->randomFloat(2),
                    'due_date'    => $faker->date(),
                    'issue_date'  => $faker->date(),
                ]
            ],
            'request_should_fail_when_description_is_empty'      => [
                'passed' => false,
                'data'   => [
                    'description' => ' ',
                    'amount'      => (string)$faker->randomFloat(2),
                    'due_date'    => $faker->date(),
                    'issue_date'  => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ],
            'request_should_fail_when_amount_is_not_numeric'     => [
                'passed' => false,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'amount'      => $faker->word(),
                    'due_date'    => $faker->date(),
                    'issue_date'  => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ],
            'request_should_fail_when_amount_is_less_than_one'   => [
                'passed' => false,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'amount'      => '0',
                    'due_date'    => $faker->date(),
                    'issue_date'  => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ],
            'request_should_pass_when_correct_data_is_provided'  => [
                'passed' => true,
                'data'   => [
                    'description' => $faker->paragraph(),
                    'amount'      => (string)$faker->randomFloat(2),
                    'due_date'    => $faker->date(),
                    'issue_date'  => $faker->date(),
                    'tags'        => [$faker->word()]
                ]
            ]
        ];
    }
}