<?php

namespace Tests\Feature\Admin;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Util\WithResourceRoutes;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithResourceRoutes;

    public function setUp(): void
    {
        parent::setUp();

        $this->registerResource('expense');
        $this->be(factory(User::class)->make());
    }

    public function testUserShouldViewListOfExpenses()
    {
        $this->get(self::indexRoute())
             ->assertSuccessful()
             ->assertViewIs('admin.expense.index');
    }

    public function testUserShouldViewCreateExpenseForm()
    {
        $this->get(self::createRoute())
             ->assertSuccessful()
             ->assertViewIs('admin.expense.create');
    }

    public function testUserShouldViewEditExpenseForm()
    {
        $expense = factory(Expense::class)->create();

        $this->get(self::editRoute($expense->id))
             ->assertSuccessful()
             ->assertViewIs('admin.expense.edit');
    }

    public function testUserShouldCreateAnExpense()
    {
        $this->from(self::createRoute())
             ->post(self::storeRoute(), [
                 'amount'      => (string) $this->faker->randomFloat(2, 1),
                 'description' => 'Expense test creation',
                 'due_date'    => $this->faker->date(),
                 'issue_date'  => $this->faker->date(),
                 'tags'        => [$this->faker->word()]
             ])->assertRedirect(self::indexRoute())
             ->assertSessionHas('success');
    }

    public function testUserShouldUpdateAnExpense()
    {
        $expense = factory(Expense::class)->create();

        $this->from(self::editRoute($expense->id))
             ->put(self::updateRoute($expense->id), [
                 'amount'      => (string) $this->faker->randomFloat(2, 1),
                 'description' => 'Expense test creation',
                 'due_date'    => $this->faker->date(),
                 'issue_date'  => $this->faker->date(),
                 'tags'        => [$this->faker->word()]
             ])->assertRedirect(self::indexRoute())
             ->assertSessionHas('success');
    }
}
