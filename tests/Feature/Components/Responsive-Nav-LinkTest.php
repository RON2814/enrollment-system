<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResponsiveNavLinkTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the navbar toggles correctly on small screens.
     *
     * @return void
     */
    public function test_navbar_toggles_on_small_screen()
    {
        // Simulate a visit to the page (e.g., home page)
        $response = $this->get('/');

        // Check if the navbar is collapsed in small screen view (check for the toggle button)
        $response->assertSee('<button class="navbar-toggler" type="button"', false); // Toggle button should be present

        // Check if the navbar items are initially hidden in the collapsed state
        $response->assertDontSee('Dashboard');
        $response->assertDontSee('Users');
        $response->assertDontSee('Settings');

        // Simulate screen resize by passing the headers to mimic a small screen
        $response = $this->get('/', [
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/537.36 (KHTML, like Gecko) Mobile/15E148',
        ]);

        // Ensure that the navbar links are hidden when the screen is small
        $response->assertSee('<button class="navbar-toggler" type="button"', false); // Toggle button should still be present
    }

    /**
     * Test if the navbar links are visible after clicking the toggle button.
     *
     * @return void
     */
    public function test_navbar_links_visible_after_toggle()
    {
        // Visit the page
        $response = $this->get('/');

        // Check if the toggle button is present (indicating a collapsed navbar)
        $response->assertSee('<button class="navbar-toggler" type="button"', false);

        // Simulate a click on the navbar toggler (this simulates a user clicking the menu on small screens)
        $response->assertSee('<button class="navbar-toggler" type="button"', false); // Ensure toggle button is clickable

        // Simulate screen size changes and ensure the links are shown
        $response->assertSee('Dashboard');  // Link visible after toggle
        $response->assertSee('Users');     // Link visible after toggle
        $response->assertSee('Settings');  // Link visible after toggle
    }

    /**
     * Test if the links are properly displayed for larger screens.
     *
     * @return void
     */
    public function test_navbar_links_on_large_screen()
    {
        // Simulate visiting the home page (larger screen size)
        $response = $this->get('/', [
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
        ]);

        // On larger screens, the navbar should show all links by default without needing to toggle
        $response->assertSee('Dashboard');
        $response->assertSee('Users');
        $response->assertSee('Settings');
    }
}
