<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthSessionStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_a_success_message_after_login()
    {
        // Create a test user
        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        // Attempt login with correct credentials
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Assert redirection and session status
        $response->assertRedirect('/home');
        $response->assertSessionHas('status', 'You are logged in!');
    }

    /** @test */
    public function it_displays_an_error_message_on_failed_login()
    {
        // Attempt login with incorrect credentials
        $response = $this->post('/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert redirection back and session error message
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('email', 'These credentials do not match our records.');
    }

    /** @test */
    public function it_displays_a_logout_success_message()
    {
        // Create a test user and log them in
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        // Perform logout
        $response = $this->post('/logout');

        // Assert redirection and session status
        $response->assertRedirect('/');
        $response->assertSessionHas('status', 'You have been logged out.');
    }
}
