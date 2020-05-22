<?php


namespace Tests\Feature\App\Http\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

abstract class RequestTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * Defines the FormRequest class to be built for test methods
     *
     * @return string
     */
    protected abstract function requestForm();

    /**
     * Defines assertions to be made by testValidationResultsAsExpected
     *
     * @return array
     */
    public abstract function validationProvider(): array;

    /**
     * Run the assertions defined in validationProvider method
     *
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

    /**
     * Validates the mocked request data using the class provided by
     * requestForm method
     *
     * @param $mockedRequestData
     *
     * @return bool
     */
    protected function validate($mockedRequestData)
    {
        $this->app->resolving($this->requestForm(),
            function ($resolved) use ($mockedRequestData) {
                $resolved->merge($mockedRequestData);
            }
        );

        try {
            app($this->requestForm());

            return true;
        } catch (ValidationException $e) {
            return false;
        }
    }
}