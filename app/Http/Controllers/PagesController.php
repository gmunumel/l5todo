<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function about() {


        // First optiona
        //return view('pages.about')->with([
        //    'first' => 'Gabriel',
        //    'last'  => 'Mesa'
        //]);

        // Second option
        //$data = [];
        //$data['first'] = 'John';
        //$data['last'] = 'Dow';
        //return view('pages.about', $data);

        // Third option
        $first = 'gabriel';
        $last  = 'mesa';
        return view('pages.about', compact('first', 'last'));
    }
}
