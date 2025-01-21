namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Handle the submission (e.g., send an email or save the message to the database)
        // You can use mail, notifications, or store the data as needed.

        // Return a success message or redirect back
        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
