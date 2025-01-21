<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminNavbarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the admin navbar is visible for an authenticated admin user.
     *
     * @return void
     */
    public function test_admin_navbar_for_authenticated_admin()
    {
        // Create an admin user (assuming you have an is_admin column in your users table)
        $admin = \App\Models\User::factory()->create([
            'is_admin' => true,  // Make sure the user is an admin
        ]);

        // Log in as the admin user
        $response = $this->actingAs($admin)->get('/dashboard');

        // Assert the navbar contains expected links for the admin
        $response->assertSee('Dashboard'); // Example link
        $response->assertSee('Users');     // Example link
        $response->assertSee('Settings');  // Example link
        $response->assertSee('Logout');    // Example link
    }

    /**
     * Test if the admin navbar is not visible for non-admin users.
     *
     * @return void
     */
    public function test_admin_navbar_for_non_admin()
    {
        // Create a non-admin user
        $user = \App\Models\User::factory()->create([
            'is_admin' => false,  // Ensure this is a non-admin user
        ]);

        // Log in as the non-admin user
        $response = $this->actingAs($user)->get('/dashboard');

        // Assert the navbar does not contain admin-specific links
        $response->assertDontSee('Users');   // Admin-only link
        $response->assertDontSee('Settings'); // Admin-only link
    }
}
