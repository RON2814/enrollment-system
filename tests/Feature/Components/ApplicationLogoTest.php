<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ApplicationLogoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_upload_an_application_logo()
    {
        // Mock the storage
        Storage::fake('public');

        // Create a fake file
        $file = UploadedFile::fake()->image('logo.png');

        // Simulate a POST request to upload the logo
        $response = $this->post('/admin/upload-logo', [
            'logo' => $file,
        ]);

        // Assert the file was stored
        $response->assertStatus(200);
        Storage::disk('public')->assertExists('logos/' . $file->hashName());
    }

    /** @test */
    public function it_displays_the_application_logo()
    {
        // Store a sample logo file
        Storage::fake('public');
        $path = Storage::disk('public')->putFileAs('logos', UploadedFile::fake()->image('logo.png'), 'logo.png');

        // Simulate a GET request to fetch the logo
        $response = $this->get('/logo');

        // Assert the logo path is returned or the image is displayed
        $response->assertStatus(200);
        $response->assertSee('/storage/logos/logo.png');
    }

    /** @test */
    public function it_requires_a_valid_file_for_upload()
    {
        // Simulate a POST request with an invalid file
        $response = $this->post('/admin/upload-logo', [
            'logo' => 'not-a-valid-file',
        ]);

        // Assert validation error
        $response->assertStatus(422);
        $response->assertSessionHasErrors(['logo']);
    }
}
