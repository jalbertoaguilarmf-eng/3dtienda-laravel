<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_is_authenticated(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Ada Lovelace',
            'username' => 'ada_lovelace',
            'email' => 'ada@example.test',
            'password' => 'StrongPassword123!',
            'password_confirmation' => 'StrongPassword123!',
            'role' => 'designer',
            'terms_agree' => '1',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Ada Lovelace',
            'username' => 'ada_lovelace',
            'email' => 'ada@example.test',
            'role' => 'designer',
        ]);
    }

    public function test_login_remembers_the_user_and_logout_ends_the_session(): void
    {
        $user = User::factory()->create([
            'email' => 'cad@example.test',
            'password' => 'StrongPassword123!',
            'remember_token' => null,
        ]);

        $this->post(route('login.store'), [
            'email' => 'cad@example.test',
            'password' => 'StrongPassword123!',
            'remember' => '1',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
        $this->assertNotEmpty($user->fresh()->remember_token);

        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_login_is_limited_after_five_failed_attempts(): void
    {
        $credentials = [
            'email' => 'missing@example.test',
            'password' => 'WrongPassword123!',
        ];

        foreach (range(1, 5) as $attempt) {
            $this->from(route('login'))
                ->post(route('login.store'), $credentials)
                ->assertRedirect(route('login'));
        }

        $this->from(route('login'))
            ->post(route('login.store'), $credentials)
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');
    }
}
