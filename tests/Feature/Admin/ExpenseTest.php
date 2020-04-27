<?php

namespace Tests\Feature\Admin;

use App\Models\Expense;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpenseTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    private static function indexExpenseRoute()
    {
        return route('expense.index');
    }

    private static function createExpenseRoute()
    {
        return route('expense.create');
    }

    private static function storeExpenseRoute()
    {
        return route('expense.store');
    }

    private static function editExpenseRoute($id)
    {
        return route('expense.edit', ['expense' => $id]);
    }

    private static function updateExpenseRoute($id)
    {
        return route('expense.update', ['expense' => $id]);
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->be(factory(User::class)->make());
    }

    public function testUserShouldViewListOfExpenses()
    {
        $this->get(self::indexExpenseRoute())
             ->assertSuccessful()
             ->assertViewIs('admin.expense.index');
    }

    public function testUserShouldViewCreateExpenseForm()
    {
        $this->get(self::createExpenseRoute())
             ->assertSuccessful()
             ->assertViewIs('admin.expense.create');
    }

    public function testUserShouldViewEditExpenseForm()
    {
        $expense = factory(Expense::class)->create();

        $this->get(self::editExpenseRoute($expense->id))
             ->assertSuccessful()
             ->assertViewIs('admin.expense.edit');
    }

    public function testUserShouldCreateAnExpense()
    {
        $this->from(self::createExpenseRoute())
             ->post(self::storeExpenseRoute(), [
                 'amount'      => (string) $this->faker->randomFloat(2, 1),
                 'description' => 'Expense test creation',
                 'due_date'    => $this->faker->date(),
                 'issue_date'  => $this->faker->date(),
                 'tags'        => [$this->faker->word()]
             ])->assertRedirect(self::indexExpenseRoute())
             ->assertSessionHas('success');
    }

    public function testUserShouldUpdateAnExpense()
    {
        $expense = factory(Expense::class)->create();

        $this->from(self::editExpenseRoute($expense->id))
             ->put(self::updateExpenseRoute($expense->id), [
                 'amount'      => (string) $this->faker->randomFloat(2, 1),
                 'description' => 'Expense test creation',
                 'due_date'    => $this->faker->date(),
                 'issue_date'  => $this->faker->date(),
                 'tags'        => [$this->faker->word()]
             ])->assertRedirect(self::indexExpenseRoute())
             ->assertSessionHas('success');
    }
}
