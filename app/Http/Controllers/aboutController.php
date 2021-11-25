<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class aboutController extends Controller
{
    function index()
    {
        if(Auth::check()){//si el usuario esta logeado usara tal plantilla
            $plantilla='usuario';
        }else{
            $plantilla='defecto';
        }
        return view('about.index', compact('plantilla'));
    }
}
