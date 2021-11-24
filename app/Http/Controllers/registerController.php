<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerController extends Controller
{
    function index()
    {
        return view('register.index');
    }

    public function store(){

        $user = User::create(request(['name', 'email', 'password']));
        auth()->login($user);
        return redirect()->to('/');

    }
}
