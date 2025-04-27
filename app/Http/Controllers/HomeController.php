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

    /**
     * Display the about page.
     */
    public function about()
    {
        // Return a simple view for the about page.
        return view('about');
    }
    /**
     * Display the services page.
     */
    public function privacy()
    {
        // Return a simple view for the services page.
        return view('privacy');
    }
}
