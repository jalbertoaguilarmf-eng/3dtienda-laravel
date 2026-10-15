<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_and_update_profile(): void
    {
        $user = User::factory()->create([
            'name' => 'Ada Lovelace',
            'username' => 'ada',
            'email' => 'ada@example.test',
            'role' => 'designer',
        ]);

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee('Datos del perfil')
            ->assertSee('Seguridad');

        $this->actingAs($user)
            ->patch(route('profile.update'), [
                'name' => 'Ada Byron',
                'username' => 'ada_byron',
                'email' => 'ada.byron@example.test',
                'role' => 'fabricator',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('profile-status');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Ada Byron',
            'username' => 'ada_byron',
            'email' => 'ada.byron@example.test',
            'role' => 'fabricator',
        ]);
    }

    public function test_authenticated_user_can_change_password(): void
    {
        $user = User::factory()->create([
            'password' => 'OldPassword123!',
        ]);

        $this->actingAs($user)
            ->put(route('profile.password'), [
                'current_password' => 'OldPassword123!',
                'password' => 'NewPassword456!',
                'password_confirmation' => 'NewPassword456!',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('password-status');

        $this->assertTrue(password_verify('NewPassword456!', $user->fresh()->password));
    }
}
