<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    function index()
    {
        return view('search.index');
    }
}
