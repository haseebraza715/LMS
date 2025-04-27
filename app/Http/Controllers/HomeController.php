<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the main page.
     */
    public function index()
    {
        // Return a simple view for the home page.
        return view('home');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        // Return a simple view for the contact page.
        return view('contact');
    }
}
