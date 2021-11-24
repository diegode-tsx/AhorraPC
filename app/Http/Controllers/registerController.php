<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser;

class registerController extends Controller
{
    function index()
    {
        return view('register.index');
    }

    public function store(StoreUser $request){

        $user = User::create(request(['username', 'email', 'password']));
        auth()->login($user);
        return redirect()->to('/');

    }

    
}
