<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PrimaryButtonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function primary_button_is_visible_on_the_page()
    {
        // Simulate visiting a page that includes the primary button
        $response = $this->get('/some-page');

        // Assert the response status is OK
        $response->assertStatus(200);

        // Check that the primary button is visible
        $response->assertSee('<button class="btn btn-primary">Submit</button>', false);
    }

    /** @test */
    public function primary_button_redirects_to_the_correct_page_on_click()
    {
        // Simulate visiting a page with the primary button
        $response = $this->get('/some-page');

        // Simulate clicking the primary button (POST request)
        $response = $this->post('/submit-form', [
            'field1' => 'value1',
            'field2' => 'value2',
        ]);

        // Assert the user is redirected to the expected page
        $response->assertRedirect('/success-page');
    }

    /** @test */
    public function primary_button_has_correct_classes()
    {
        // Simulate visiting a page with the primary button
        $response = $this->get('/some-page');

        // Check if the primary button has the correct Bootstrap class (btn-primary)
        $response->assertSee('<button class="btn btn-primary">Submit</button>', false);
    }

    /** @test */
    public function primary_button_label_is_customizable()
    {
        // Simulate visiting a page with a customizable label for the primary button
        $response = $this->get('/some-page-with-custom-button-label');

        // Check if the button displays the custom label
        $response->assertSee('<button class="btn btn-primary">Custom Label</button>', false);
    }
}
