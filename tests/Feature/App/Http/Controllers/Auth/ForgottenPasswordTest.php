<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgottenPasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private static $password = 'password';

    private static function passwordRequestRoute()
    {
        return route('password.request');
    }

    private static function passwordEmailRoute()
    {
        return route('password.email');
    }

    private static function passwordResetRoute($token)
    {
        return route('password.reset', ['token' => $token]);
    }

    private static function passwordUpdateRoute()
    {
        return route('password.update');
    }

    private static function homeRoute()
    {
        return route('dashboard.index');
    }

    public function testUserShouldViewALinkRequestForm()
    {
        $this->get(self::passwordRequestRoute())
             ->assertSuccessful()
             ->assertViewIs('auth.passwords.email');
    }

    public function testEmailShouldBeRequired()
    {
        $this->from(self::passwordRequestRoute())
             ->post(self::passwordEmailRoute(), [])
             ->assertRedirect(self::passwordRequestRoute())
             ->assertSessionHasErrors('email');
    }

    public function testEmailShouldBeValid()
    {
        $this->from(self::passwordRequestRoute())
             ->post(self::passwordEmailRoute(), ['email' => 'invalid-email'])
             ->assertRedirect(self::passwordRequestRoute())
             ->assertSessionHasErrors('email');
    }

    public function testUserShouldReceiveAnEmailWithAPasswordResetLink()
    {
        Notification::fake();

        $user = factory(User::class)->create();

        $this->post(self::passwordEmailRoute(), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function testUserShouldNotReceiveEmailWhenNotRegistered()
    {
        Notification::fake();

        $user = factory(User::class)->make(['email' => 'nobody@example.com']);

        $this->from(self::passwordRequestRoute())
             ->post(self::passwordEmailRoute(), ['email' => $user->email])
             ->assertRedirect(self::passwordRequestRoute())
             ->assertSessionHasErrors('email');

        Notification::assertNotSentTo($user, ResetPassword::class);
    }

    public function testUserShouldViewResetFormWhenHasAValidToken()
    {
        $user = factory(User::class)->create();

        $token = Password::broker()->createToken($user);

        $this->get(self::passwordResetRoute($token))
             ->assertSuccessful()
             ->assertViewIs('auth.passwords.reset');
    }

    public function testUserShouldNotBeFoundWhenEmailIsInvalid()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt(self::$password),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker->password(8);

        $this->from(self::passwordResetRoute($token))
             ->post(self::passwordUpdateRoute(), [
                 'token'                 => $token,
                 'email'                 => $this->faker->unique()->safeEmail,
                 'password'              => $password,
                 'password_confirmation' => $password,
             ])
             ->assertRedirect(self::passwordResetRoute($token));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));
        $this->assertTrue(Hash::check(self::$password, $user->password));
    }

    public function testUserShouldNotBeUpdatedWhenPasswordMismatch()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt(self::$password),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker->password(8);
        $password_confirmation = $this->faker->password(10);

        $this->from(self::passwordResetRoute($token))
             ->post(self::passwordUpdateRoute(), [
                 'token'                 => $token,
                 'email'                 => $user->email,
                 'password'              => $password,
                 'password_confirmation' => $password_confirmation,
             ])
             ->assertRedirect(self::passwordResetRoute($token))
             ->assertSessionHasErrors('password');

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::$password, $user->password));
    }

    public function testUserShouldNotBeUpdatedWhenPasswordIsTooShort()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt(self::$password),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker()->password(1, 7);

        $this->from(self::passwordResetRoute($token))
             ->post(self::passwordUpdateRoute(), [
                 'token'                 => $token,
                 'email'                 => $user->email,
                 'password'              => $password,
                 'password_confirmation' => $password,
             ])
             ->assertRedirect(self::passwordResetRoute($token))
             ->assertSessionHasErrors('password');

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));
        $this->assertTrue(Hash::check(self::$password, $user->password));
    }

    public function testShouldUserBeUpdatedWhenPasswordAndEmailIsValid()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt(self::$password),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker()->password(8);

        $this->from(self::passwordResetRoute($token))
             ->post(self::passwordUpdateRoute(), [
                 'token'                 => $token,
                 'email'                 => $user->email,
                 'password'              => $password,
                 'password_confirmation' => $password,
             ])
             ->assertRedirect(self::homeRoute());

        $user->refresh();

        $this->assertFalse(Hash::check(self::$password, $user->password));
        $this->assertTrue(Hash::check($password, $user->password));
    }
}
