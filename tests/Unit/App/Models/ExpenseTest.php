<?php


namespace Tests\Unit\App\Models;


use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExpenseTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testExpenseDataBaseHasExpectedColumns()
    {
        $this->assertTrue(
            Schema::hasColumns('expenses', [
                "id",
                "amount",
                "description",
                "due_date",
                "issue_date",
                "created_at",
                "updated_at"
            ]));
    }

    public function testSetDueDateAttribute()
    {
        $expense = new Expense();
        $expense->due_date = Carbon::now();

        $this->assertInstanceOf(Carbon::class, $expense->due_date);
    }

    public function testSetIssueDateAttribute()
    {
        $expense = new Expense();
        $expense->issue_date = Carbon::now();

        $this->assertInstanceOf(Carbon::class, $expense->issue_date);
    }

    public function testTranslation()
    {
        $this->assertEquals(
            (object) trans('models.expense'),
            Expense::translate()
        );
    }
}