<?php


namespace Tests\Feature\App\Http\Requests;


use App\Http\Requests\SaveAccount;
use App\Models\Kinds\AccountKind;
use Faker\Factory;

class SaveAccountTest extends RequestTestCase
{
    protected function requestForm()
    {
        return SaveAccount::class;
    }

    public function validationProvider(): array
    {
        $faker = Factory::create();

        return [
            'request_should_fail_when_no_name_is_provided'      => [
                'passed' => false,
                'data'   => [
                    'balance'  => (string)$faker->randomFloat(2),
                    'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
                    'owner_id' => $faker->randomNumber()
                ]
            ],
            'request_should_fail_when_no_balance_is_provided'   => [
                'passed' => false,
                'data'   => [
                    'name'     => $faker->word(),
                    'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
                    'owner_id' => $faker->randomNumber()
                ]
            ],
            'request_should_fail_when_no_kind_is_provided'      => [
                'passed' => false,
                'data'   => [
                    'name'     => $faker->word(),
                    'balance'  => (string)$faker->randomFloat(2),
                    'owner_id' => $faker->randomNumber()
                ]
            ],
            'request_should_fail_when_no_owner_id_is_provided'  => [
                'passed' => false,
                'data'   => [
                    'name'    => $faker->word(),
                    'balance' => (string)$faker->randomFloat(2),
                    'kind'    => strtolower(array_rand(AccountKind::toArray(), 1)),
                ]
            ],
            'request_should_fail_when_name_is_empty'       => [
                'passed' => false,
                'data'   => [
                    'name'     => ' ',
                    'balance'  => (string)$faker->randomFloat(2),
                    'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
                    'owner_id' => $faker->randomNumber()
                ]
            ],
            'request_should_fail_when_balance_is_not_numeric'   => [
                'passed' => false,
                'data'   => [
                    'name'     => $faker->word(),
                    'balance'  => $faker->word(),
                    'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
                    'owner_id' => $faker->randomNumber()
                ]
            ],
            'request_should_pass_when_correct_data_is_provided' => [
                'passed' => true,
                'data'   => [
                    'name'     => $faker->word(),
                    'balance'  => (string)$faker->randomFloat(2),
                    'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
                    'owner_id' => $faker->randomNumber()
                ]
            ]
        ];
    }
}