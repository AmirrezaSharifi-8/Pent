<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_access_dashboard_after_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get(route('logout'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    }
}
