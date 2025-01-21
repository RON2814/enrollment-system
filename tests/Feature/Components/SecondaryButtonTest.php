<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecondaryButtonTest extends TestCase
{
    /**
     * Test if the secondary button is rendered correctly.
     *
     * @return void
     */
    public function test_secondary_button_rendered()
    {
        // Visit a page that includes the secondary button (e.g., home page or a specific page with a button)
        $response = $this->get('/'); // Change to your route that contains the button

        // Check if the button is visible and has the correct text
        $response->assertSee('Cancel'); // The button text (secondary action)
        $response->assertSee('class="btn btn-secondary"'); // Assuming you're using Bootstrap for styles
    }

    /**
     * Test if the secondary button can trigger an action (e.g., form submission or redirect).
     *
     * @return void
     */
    public function test_secondary_button_action()
    {
        // If the secondary button is part of a form, test if it triggers the expected action
        $response = $this->post('/submit-form', [
            // Form data goes here (you may not need data for a secondary button if it's just for cancelling or redirecting)
        ]);

        // Check if the form submission is redirected correctly or the right view is returned
        $response->assertRedirect('/home'); // Adjust this to your expected redirect path
        $response->assertSessionHasNoErrors(); // If applicable, assert no errors during the process
    }

    /**
     * Test if the button appears in the correct place in the page's HTML.
     *
     * @return void
     */
    public function test_button_position()
    {
        // Visit the page where the secondary button should be present
        $response = $this->get('/'); // Change to your page URL

        // Ensure that the button is correctly placed in the HTML
        $response->assertSeeInOrder([
            'Cancel', // Button text
            'class="btn btn-secondary"', // Ensure it has the correct class for a secondary button
        ]);
    }
}
