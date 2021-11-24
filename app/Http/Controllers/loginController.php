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
        if(auth()->attempt(request(['email', 'password']))==false){
            return back()->withErrors([
                'message'=>'The email or password is incorrect, please try again'
            ]);
        }
        return redirect()->to('/');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
