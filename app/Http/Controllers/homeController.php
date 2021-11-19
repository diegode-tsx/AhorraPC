<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    function __invoke()
    {
        return view('home');
    }
    
}
