<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    function index()
    {
        return view('register.index');
    }
}
