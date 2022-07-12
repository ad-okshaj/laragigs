<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
            'listings' => Listing::latest() -> filter(request(['tag', 'search'])) -> get()
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
    
}
