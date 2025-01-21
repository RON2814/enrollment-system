<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

Route::post('/admin/upload-logo', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('logo')->store('logos', 'public');
    return response()->json(['path' => Storage::url($path)], 200);
});

Route::get('/logo', function () {
    $path = 'logos/logo.png';
    return response()->file(storage_path('app/public/' . $path));
});

Route::get('/danger-action/confirm/{id}', function ($id) {
    $resource = Resource::findOrFail($id);
    return view('confirm', ['resource' => $resource]);
})->middleware('auth');

Route::post('/danger-action', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'id' => 'required|exists:resources,id',
    ]);

    $resource = Resource::findOrFail($request->id);
    $resource->delete();

    return redirect('/resources')->with('status', 'Resource deleted successfully.');
})->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/dropdown-option-1', function () {
    return 'You selected Option 1';
})->middleware('auth');

Route::get('/dropdown-option-2', function () {
    return 'You selected Option 2';
})->middleware('auth');

Route::get('/admin-panel', function () {
    return 'Welcome to the Admin Panel';
})->middleware(['auth', 'can:access-admin-panel']);

Route::view('/form', 'form');
Route::post('/form-submit', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    return redirect('/success');
});

Route::view('/success', 'success');

use Illuminate\Support\Facades\Route;

Route::view('/form', 'form');


Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
Route::view('/profile', 'profile')->middleware('auth')->name('profile');

Route::view('/some-page', 'some-page');
Route::view('/some-page-with-custom-button-label', 'some-page-custom');
Route::post('/submit-form', function () {
    return redirect('/success-page');
});
Route::view('/success-page', 'success');

Route::view('/about', 'about')->name('about');


Route::view('/contact', 'contact')->name('contact');  // Route for the contact page

// Handle the form submission
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Define the route for the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Define other routes for profile, settings, notifications, etc.
Route::get('/profile', [UserController::class, 'show'])->middleware('auth')->name('profile');
Route::get('/settings', [SettingsController::class, 'edit'])->middleware('auth')->name('settings');
Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth')->name('notifications');

// Success page route
Route::view('/success', 'success')->name('success');


use App\Http\Controllers\AdminController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

class WebTest extends TestCase
{
    // Test profile edit route for unauthenticated user
    public function test_profile_edit_route_for_unauthenticated_user()
    {
        // Make a GET request to the profile edit route
        $response = $this->get(route('profile.edit'));

        // Assert that the user is redirected to the login page
        $response->assertRedirect(route('login'));
    }

    // Test profile update route for authenticated user
    public function test_profile_update_route_for_authenticated_user()
    {
        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make a PATCH request to update the profile
        $response = $this->patch(route('profile.update'), [
            // Assuming your profile update requires these fields
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        // Assert that the response is a redirect (after updating)
        $response->assertStatus(302);
        // Optionally, check if it redirects to the correct route, for example:
        $response->assertRedirect(route('profile.edit'));
    }

    // Test profile delete route for authenticated user
    public function test_profile_delete_route_for_authenticated_user()
    {
        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make a DELETE request to destroy the profile
        $response = $this->delete(route('profile.destroy'));

        // Assert that the response is a redirect (after deleting)
        $response->assertStatus(302);
        // Optionally, check if it redirects to the correct route
        $response->assertRedirect(route('index')); // or wherever you want to redirect after deletion
    }

    // Test view-test route
    public function test_view_test_route()
    {
        $response = $this->get('/view-test');
        $response->assertViewIs('layout.app');
    }

    
}
