<?php


namespace Tests\Feature\Admin;


use App\Models\Account;
use App\Models\Kinds\AccountKind;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Util\WithResourceRoutes;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithResourceRoutes;

    /** @var \App\Models\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->registerResource('account');
        $this->be($this->user);
    }

    public function testUserShouldViewListOfAccounts()
    {
        $this->get(self::indexRoute())
             ->assertSuccessful()
             ->assertViewIs('admin.account.index');
    }

    public function testUserShouldViewCreateAccountForm()
    {
        $this->get(self::createRoute())
             ->assertSuccessful()
             ->assertViewIs('admin.account.create');
    }

    public function testUserShouldViewEditAccountForm()
    {
        $account = factory(Account::class)->create();

        $this->get(self::editRoute($account->id))
             ->assertSuccessful()
             ->assertViewIs('admin.account.edit');
    }

    public function testUserShouldCreateAnAccount()
    {
        $this->from(self::createRoute())
             ->post(self::storeRoute(), $this->accountData())
             ->assertRedirect(self::indexRoute())
             ->assertSessionHas('success');
    }

    public function testUserShouldUpdateAnAccount()
    {
        $account = factory(Account::class)->create();

        $this->from(self::editRoute($account->id))
             ->put(self::updateRoute($account->id), $this->accountData())
             ->assertRedirect(self::indexRoute())
             ->assertSessionHas('success');
    }

    private function accountData()
    {
        return [
            'name'     => $this->faker->word(),
            'balance'  => (string)$this->faker->randomFloat(2, 1),
            'kind'     => strtolower(array_rand(AccountKind::toArray(), 1)),
            'owner_id' => $this->user->id
        ];
    }
}