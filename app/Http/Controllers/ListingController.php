<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


class ListingController extends Controller
{
    //show all listings
    public function index(){
        // listings/index.blade.php
        return view('listings.index', [
            'listings' => Listing::latest() -> filter(request(['tag', 'search'])) -> paginate(6)
            ]);
    }
    //show single listing
    public function show(Listing $listing){
        // listings/show.blade.php
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

     // Show Create Form
     public function create() {
         return view('listings.create');
    }

     // Store Listing Data
     public function store(Request $request) {
        //validate takes an array input 
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    
    }
}
