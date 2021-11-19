<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingController extends Controller
{
    function index()
    {
        return view('setting.index');
    }
}
