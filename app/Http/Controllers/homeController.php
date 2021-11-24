<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    function __invoke()
    {
        if(Auth::check()){//si el usuario esta logeado usara tal plantilla
            $plantilla='usuario';
        }else{
            $plantilla='defecto';
        }
        return view('home', compact('plantilla'));//requiere el compact xd aun nose paque
    }

    

    
}
