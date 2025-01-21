<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class DropDownLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dropdown_links_are_visible_to_authenticated_users()
    {
        // Create a test user
        $user = User::factory()->create();

        // Act as the authenticated user
        $this->actingAs($user);

        // Simulate visiting a page with a dropdown
        $response = $this->get('/home');

        // Assert the dropdown and its links are visible
        $response->assertStatus(200);
        $response->assertSee('Dropdown Menu');
        $response->assertSee('Profile');
        $response->assertSee('Logout');
    }

    /** @test */
    public function dropdown_links_are_not_visible_to_unauthenticated_users()
    {
        // Simulate visiting the page as a guest
        $response = $this->get('/home');

        // Assert the dropdown links are not visible
        $response->assertStatus(200);
        $response->assertDontSee('Dropdown Menu');
        $response->assertDontSee('Profile');
        $response->assertDontSee('Logout');
    }

    /** @test */
    public function the_dropdown_links_redirect_to_correct_pages()
    {
        // Create a test user
        $user = User::factory()->create();

        // Act as the authenticated user
        $this->actingAs($user);

        // Simulate clicking a dropdown link (e.g., Profile)
        $response = $this->get('/profile');
        $response->assertStatus(200);
        $response->assertSee('Your Profile'); // Assuming the profile page has this text

        // Simulate clicking the logout link
        $response = $this->post('/logout');
        $response->assertRedirect('/');
    }
}
