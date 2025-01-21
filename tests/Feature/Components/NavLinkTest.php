<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function navigation_links_are_visible_on_the_homepage()
    {
        // Simulate visiting the homepage
        $response = $this->get('/');

        // Assert the response status is OK
        $response->assertStatus(200);

        // Assert that the navigation links are visible
        $response->assertSee('Home');
        $response->assertSee('About');
        $response->assertSee('Contact');
    }

    /** @test */
    public function navigation_links_redirect_to_correct_pages()
    {
        // Simulate clicking the Home link
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Welcome to the Home Page');

        // Simulate clicking the About link
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('About Us');

        // Simulate clicking the Contact link
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Contact Us');
    }

    /** @test */
    public function navigation_links_display_properly_for_authenticated_users()
    {
        // Create an authenticated user
        $user = \App\Models\User::factory()->create();

        // Act as the authenticated user
        $this->actingAs($user);

        // Simulate visiting the homepage
        $response = $this->get('/');

        // Assert the navigation links for authenticated users are visible
        $response->assertSee('Dashboard');
        $response->assertSee('Profile');
        $response->assertSee('Logout');
    }
}
