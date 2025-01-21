<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Resource; // Replace with the actual model you're working with

class DangerButtonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_requires_authentication_to_access_the_danger_action()
    {
        // Attempt to trigger the danger action without authentication
        $response = $this->post('/danger-action');

        // Assert that the user is redirected to the login page
        $response->assertRedirect('/login');
    }

    /** @test */
    public function it_allows_an_authenticated_user_to_perform_the_danger_action()
    {
        // Create a test user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a resource to delete
        $resource = Resource::factory()->create();

        // Perform the danger action (e.g., delete the resource)
        $response = $this->post('/danger-action', ['id' => $resource->id]);

        // Assert that the resource is deleted
        $this->assertDatabaseMissing('resources', ['id' => $resource->id]);

        // Assert a success message is in the session
        $response->assertRedirect('/resources');
        $response->assertSessionHas('status', 'Resource deleted successfully.');
    }

    /** @test */
    public function it_displays_a_confirmation_message_before_performing_the_danger_action()
    {
        // Create a test user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a resource
        $resource = Resource::factory()->create();

        // Simulate viewing the confirmation dialog
        $response = $this->get('/danger-action/confirm/' . $resource->id);

        // Assert the confirmation page is shown
        $response->assertStatus(200);
        $response->assertSee('Are you sure you want to delete this resource?');
    }
}
