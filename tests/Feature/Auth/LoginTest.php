<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private static $password = 'password';

    public function testUserCanViewLoginForm()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testUserCannotViewALoginFormWhenAuthenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/admin/dashboard');
    }

    public function testUserCanLoginWithCorrectCredentials()
    {
        $user = factory(User::class)->create(
            ['password' => bcrypt(self::$password)]
        );

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => self::$password,
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function testUserCannotLoginWithIncorrectPassword()
    {
        $user = factory(User::class)->create(
            ['password' => bcrypt(self::$password)]
        );

        $response = $this->from('/login')->post('/login', [
            'email'    => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testRememberMeFunctionality()
    {
        $user = factory(User::class)->create([
            'id'       => random_int(1, 100),
            'password' => bcrypt(self::$password),
        ]);

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => self::$password,
            'remember' => 'on',
        ]);

        $response->assertCookie(Auth::guard()->getRecallerName(),
            vsprintf('%s|%s|%s', [
                $user->id,
                $user->getRememberToken(),
                $user->password
            ])
        );
    }
}
