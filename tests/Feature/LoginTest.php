<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function test_successful_login(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '123456',
            'remember' => false
        ]);

        $this->user->refresh();

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
        $response->assertCookieMissing(Auth::getRecallerName());
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_validation_error(): void
    {
        $response = $this->post('/login', [
            'email' => 'test',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function test_user_not_found_or_password_is_incorrect(): void
    {
        // user not found
        $response1 = $this->post('/login', [
            'email' => 'test2@example.com',
            'password' => '123456'
        ]);

        $response1->assertRedirect();
        $response1->assertSessionHasErrors(['email']);

        // password is not correct
        $response2 = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '1234567'
        ]);

        $response2->assertRedirect();
        $response2->assertSessionHasErrors(['email']);
    }

    public function test_remember_user(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '123456',
            'remember' => '1'
        ]);

        $this->user->refresh();

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
        $response->assertCookieNotExpired(Auth::getRecallerName());
        $this->assertAuthenticatedAs($this->user);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'first_name' => 'Amirreza',
            'last_name' => 'Sharifi',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
            'is_active' => true
        ]);
    }
}
