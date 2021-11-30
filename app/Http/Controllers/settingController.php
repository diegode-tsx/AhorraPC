<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSetting;
use App\Models\User;

class settingController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    function index()
    {
        

        if(Auth::check()){//si el usuario esta logeado usara tal plantilla
            $plantilla='usuario';
        }else{
            $plantilla='defecto';
        }
        
        
        return view('setting.index', compact('plantilla'));
    }

    


    function store(StoreSetting $request){


        
        $password = $_POST['actual-password'];
        $newpassword = $_POST['new_password'];
        $userpass = Auth::user()->getAuthPassword();
        $id = Auth::user()->id;

        if(Hash::check($password, $userpass)){
            $user = User::find($id);
            $user->password = $newpassword;
            $user->save();
            return back()->with('success', 'La contrasela se ha cambiado correctamente');
        }else{
            return back()->with('fail' , 'Credenciales incorrectas');
        }
        
        

    }
}
