<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        // Store the form submission in the database
        FormSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Thank you! Your message has been sent.');
    }
}
