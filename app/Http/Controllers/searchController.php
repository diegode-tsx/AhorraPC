<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    function index(Request $request)
    {
        $search = $request->input('busqueda');
        $search = str_replace(' ', '+', $search);
        return   /* $request->all() */ /* view('search.index') */;
    }
}
