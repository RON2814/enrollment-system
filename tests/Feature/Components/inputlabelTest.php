<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InputLabelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function input_labels_are_present_and_associated_with_fields()
    {
        // Simulate visiting the form page
        $response = $this->get('/form');

        // Assert the response status is OK
        $response->assertStatus(200);

        // Check for labels and their associated fields
        $response->assertSee('<label for="name">Name:</label>', false);
        $response->assertSee('<input type="text" id="name" name="name"', false);

        $response->assertSee('<label for="email">Email:</label>', false);
        $response->assertSee('<input type="email" id="email" name="email"', false);
    }

    /** @test */
    public function labels_and_inputs_match_for_accessibility()
    {
        // Simulate visiting the form page
        $response = $this->get('/form');

        // Assert that all labels are correctly associated with inputs
        $response->assertSeeInOrder([
            '<label for="name">',
            '<input type="text" id="name"',
            '<label for="email">',
            '<input type="email" id="email"',
        ], false);
    }
}
