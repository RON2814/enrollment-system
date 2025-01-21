<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InputErrorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_errors_for_required_fields()
    {
        // Simulate a form submission with missing required fields
        $response = $this->post('/form-submit', []);

        // Assert the response contains validation errors
        $response->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.',
        ]);
    }

    /** @test */
    public function it_shows_error_for_invalid_email()
    {
        // Simulate a form submission with an invalid email
        $response = $this->post('/form-submit', [
            'name' => 'John Doe',
            'email' => 'not-an-email',
        ]);

        // Assert the response contains a validation error for the email field
        $response->assertSessionHasErrors([
            'email' => 'The email must be a valid email address.',
        ]);
    }

    /** @test */
    public function it_redirects_back_with_old_input_on_validation_error()
    {
        // Simulate a form submission with missing required fields
        $response = $this->post('/form-submit', [
            'name' => '',
            'email' => '',
        ]);

        // Assert redirection back to the form with old input
        $response->assertRedirect();
        $response->assertSessionHasErrors();
        $response->assertSessionHasInput([
            'name' => '',
            'email' => '',
        ]);
    }

    /** @test */
    public function it_allows_submission_with_valid_data()
    {
        // Simulate a form submission with valid data
        $response = $this->post('/form-submit', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Assert there are no errors and the user is redirected
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/success');
    }
}
