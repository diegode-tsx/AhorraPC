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

        $pages=10;
        $idUser = Auth::user()->id;
        $countFavs = DB::table('favorites')->where('idUser','=',$idUser)->get();
        if(isset($countFavs->first()->nomProduct)){
            $cant = $countFavs->count();
        
        if($cant < 10){
            $pages = 1;
        }
        }


        
        $favProduct = DB::table('favorites')
        ->join('pages', 'pages.idPage','=', 'favorites.idPage')
        ->select('*')
        ->where('idUser','=',$idUser)
        ->paginate($pages);

        return view('favorite.index', compact('plantilla', 'favProduct'));
    }
}
