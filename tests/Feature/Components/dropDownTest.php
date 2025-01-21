<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class DropDownTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dropdown_is_visible_to_authenticated_users()
    {
        // Create a test user
        $user = User::factory()->create();

        // Act as the authenticated user
        $this->actingAs($user);

        // Simulate visiting the page with a dropdown
        $response = $this->get('/home');

        // Assert the dropdown and its options are visible
        $response->assertStatus(200);
        $response->assertSee('Dropdown Menu');
        $response->assertSee('Option 1');
        $response->assertSee('Option 2');
    }

    /** @test */
    public function dropdown_is_not_visible_to_unauthenticated_users()
    {
        // Simulate visiting the page as a guest
        $response = $this->get('/home');

        // Assert the dropdown is not visible
        $response->assertStatus(200);
        $response->assertDontSee('Dropdown Menu');
    }

    /** @test */
    public function dropdown_option_redirects_to_correct_page()
    {
        // Create a test user
        $user = User::factory()->create();

        // Act as the authenticated user
        $this->actingAs($user);

        // Simulate selecting a dropdown option
        $response = $this->get('/dropdown-option-1');

        // Assert the redirection to the correct page
        $response->assertStatus(200);
        $response->assertSee('You selected Option 1'); // Content on the destination page
    }

    /** @test */
    public function only_admin_can_see_admin_dropdown_option()
    {
        // Create a regular user
        $user = User::factory()->create(['role' => 'user']);

        // Act as the regular user
        $this->actingAs($user);

        // Simulate visiting the page
        $response = $this->get('/home');

        // Assert the admin dropdown option is not visible
        $response->assertStatus(200);
        $response->assertDontSee('Admin Panel');

        // Create an admin user
        $admin = User::factory()->create(['role' => 'admin']);

        // Act as the admin user
        $this->actingAs($admin);

        // Simulate visiting the page
        $response = $this->get('/home');

        // Assert the admin dropdown option is visible
        $response->assertStatus(200);
        $response->assertSee('Admin Panel');
    }
}
