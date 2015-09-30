<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /*
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /*
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index() {
        return view('welcome');
    }

    /*
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function contact() {
        return view('pages.contact');
    }
}
