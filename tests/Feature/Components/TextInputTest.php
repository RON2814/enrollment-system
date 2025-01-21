<?php

namespace Tests\Feature;

use Tests\TestCase;

class TextInputTest extends TestCase
{
    /**
     * Test if the text input field is rendered correctly.
     *
     * @return void
     */
    public function test_text_input_rendered()
    {
        // Simulate visiting a page that contains the text input field
        $response = $this->get('/form'); // Change to the route that contains your form with the text input

        // Check if the input field is rendered correctly
        $response->assertSee('<input type="text"'); // Check for the presence of the input field
        $response->assertSee('name="username"'); // Check if the input has the correct name attribute
        $response->assertSee('placeholder="Enter your username"'); // Check if the placeholder is present
    }

    /**
     * Test if the text input can accept user input.
     *
     * @return void
     */
    public function test_text_input_accepts_user_input()
    {
        // Send a POST request to the form with user input
        $response = $this->post('/submit-form', [
            'username' => 'john_doe', // User input value for the text input
        ]);

        // Assert that the form submission was successful
        $response->assertRedirect('/success'); // Check if the page redirects to the success page after form submission
        $response->assertSessionHasNoErrors(); // Check if there are no validation errors

        // You can also check if the data is stored correctly or displayed on the success page if needed
    }

    /**
     * Test if the text input field shows validation errors when empty.
     *
     * @return void
     */
    public function test_text_input_validation_error()
    {
        // Send a POST request with empty data for the text input
        $response = $this->post('/submit-form', [
            'username' => '', // Empty input value to trigger validation error
        ]);

        // Assert that the form returns the expected validation error
        $response->assertSessionHasErrors('username'); // Check for validation errors related to the 'username' input
    }

    /**
     * Test if the text input field retains its value after submission (for validation failure).
     *
     * @return void
     */
    public function test_text_input_value_retained_on_error()
    {
        // Send a POST request with empty data (or invalid data)
        $response = $this->post('/submit-form', [
            'username' => '', // Empty input value to trigger validation error
        ]);

        // Assert that the form returns the validation error
        $response->assertSessionHasErrors('username'); // Ensure validation error is triggered

        // Ensure the input retains the value (empty in this case)
        $response->assertSee('value=""'); // Check that the value is retained in the input field
    }
}
