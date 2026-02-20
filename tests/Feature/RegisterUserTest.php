<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_successful_register(): void
    {
        $response = $this->post('/register', [
            'first_name' => 'Amir',
            'last_name' => 'Sharifi',
            'email' => 'amir@example.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', ['email' => 'amir@example.com']);
    }

    public function test_validation_error(): void
    {
        $response = $this->post('/register', [
            'email' => 'test',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'password']);
    }

    public function test_password_is_not_confirmed(): void
    {
        $response = $this->post('/register', [
            'first_name' => 'Amir',
            'last_name' => 'Sharifi',
            'email' => 'amir@example.com',
            'password' => '12345678'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['password']);
    }
}
