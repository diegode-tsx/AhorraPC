<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class loginController extends Controller
{
    function index()
    {
        //$users = User::paginate(20);

        //return view('login.index', compact('users'));
        return view('login.index');
    }

       


    public function store(){
        if(auth()->attempt(request(['username', 'password']))==false){
            return back()->withErrors([
                'message'=>'El correo electrónico o la contraseña son incorrectos, inténtelo de nuevo.'
            ]);
        }else
        return redirect()->to('/');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
