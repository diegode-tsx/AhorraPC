<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class favoriteController extends Controller
{
    function index()
    {
        if(Auth::check()){//si el usuario esta logeado usara tal plantilla
            $plantilla='usuario';
        }else{
            $plantilla='defecto';
        }
        $idUser = Auth::user()->id;
        $favProduct = DB::table('favorites')
        ->join('pages', 'pages.idPage','=', 'favorites.idPage')
        ->select('*')
        ->where('idUser','=',$idUser)
        ->paginate(10);
        
        return view('favorite.index', compact('plantilla', 'favProduct'));
    }
}
