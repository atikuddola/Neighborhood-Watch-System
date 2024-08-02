<?php

namespace App\Http\Controllers;

use App\Models\PostSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller
{

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request

        $request->validate([

            'status' => 'required|string|max:255',
        ]);
    

        // Store the form submission in the database
        PostSubmission::create([
            'status' => $request->status,
            'user_name' => Auth::user()->name,
            
        ]);
        return redirect()->back()->with('posted');
    
    }    

}
