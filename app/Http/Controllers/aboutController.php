<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    function index()
    {
        return view('about.index');
    }
}
