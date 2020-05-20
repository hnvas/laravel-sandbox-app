<?php


namespace Tests\Feature\App\Http\Requests;


use App\Http\Requests\SaveAccount;
use App\Models\Kinds\AccountKind;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class SaveAccountRequestTest extends TestCase
{

    use RefreshDatabase;

    public function validationProvider()
    {
        $faker = Factory::create();

        return [
            'request_should_fail_when_no_name_is_provided'     => [
                'passed' => false,
                'data'   => [
                    'balance' => (string)$faker->randomFloat(2)
                ]
            ],
            'request_should_fail_when_no_balance_is_provided'  => [
                'passed' => false,
                'data'   => [
                    'name' => $faker->word()
                ]
            ],
            'request_should_fail_when_no_kind_is_provided'     => [
                'passed' => false,
                'data'   => [
                    'name' => $faker->word()
                ]
            ],
            'request_should_fail_when_no_owner_id_is_provided' => [
                'passed' => false,
                'data'   => [
                    'name' => $faker->word()
                ]
            ],
            'request_should_fail_when_name_is_not_string' => [
                'passed' => false,
                'data' => [
                    'name' => $faker->randomNumber()
                ]
            ],
            'request_should_fail_when_balance_is_not_numeric' => [
                'passed' => false,
                'data' => [
                    'name' => $faker->word()
                ]
            ],
            'request_should_pass_when_correct_data_is_provided' => [
                'passed' => true,
                'data' => [
                    'name'     => $faker->word(),
                    'balance'  => (string)$faker->randomFloat(2),
                    'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
                    'owner_id' => $faker->randomNumber()
                ]
            ]
        ];
    }

    /**
     * @dataProvider validationProvider
     *
     * @param bool $shouldPass
     * @param array $mockedRequestData
     */
    public function testValidationResultsAsExpected(
        bool $shouldPass,
        array $mockedRequestData
    )
    {
        $this->assertEquals(
            $shouldPass,
            $this->validate($mockedRequestData)
        );
    }

    protected function validate($mockedRequestData)
    {
        $this->app->resolving(SaveAccount::class,
            function ($resolved) use ($mockedRequestData) {
                $resolved->merge($mockedRequestData);
            }
        );

        try {
            app(SaveAccount::class);

            return true;
        } catch (ValidationException $e) {
            return false;
        }
    }
}