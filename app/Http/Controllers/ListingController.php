<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Show all listings
    public function index()
    {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Log user ID for debugging
        Log::info('User ID', ['user_id' => Auth::id()]);

        // Check if user is logged in
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'You need to be logged in to create a listing.');
        }

        $formFields = $request->validate([
            'title' => 'required|max:255',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required|min:10|max:1000',
        ]);


        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        };

        $formFields['user_id'] = Auth::id();

        $listing = Listing::create($formFields);

        return redirect('/listings/' . $listing->id)->with('message', 'Listing created successfully');
    }

    /**
     * Display the specified resource.
     */
     // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        // Check if logged in user is owner of listing
        if ($listing->user_id != Auth::id()) {
            return abort(403, 'Unauthorized action.');
        }

        $formFields = $request->validate([
            'title' => 'required|max:255',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required|min:10|max:1000',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        };

        $listing->update($formFields);

        return redirect('/listings/' . $listing->id)->with('message', 'Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing) {

        // Check if logged in user is owner of listing
        if ($listing->user_id != Auth::id()) {
            return abort(403, 'Unauthorized action.');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage() {
        $user = Auth::user();

        // Check if user is logged in
        if (!$user) {
            return redirect('/login')->with('message', 'Please log in first.');
        }

        return view('listings.manage', ['listings' => $user->listings]);
    }
}
