<?php

namespace App\Http\Controllers;

//yolo archivement
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    function index()
    {
        //$users = User::paginate(20);

        //return view('login.index', compact('users'));
        return view('login.index');
    }

       


    public function store(){
        $username = $_POST['username'];
        $user = DB::table('users')->select('username','email_confirm')->where('username','=',$username)->get();
        if(isset($user->first()->username)){        
        $username_db = $user->first()->username;

        
        if($username_db === $username){
        if(!isset($user->first()->email_confirm)){
        
        if(auth()->attempt(request(['username', 'password']))==false){//El attemptmétodo regresará truesi la autenticación fue exitosa. De lo contrario, falseserá devuelto.
            return back()->withErrors(['message'=>'El correo electrónico o la contraseña son incorrectos, inténtelo de nuevo.'
            ]);
        }else{
        //$username = auth()->request(['username']);
        return  redirect()->to('/');
        }
    }
    return back()->with('email_v', 'Debes verificar tu correo');
    }
}
    return back()->withErrors([//nos deja enviar cualquier mensaje a la vista mediante @errors
        'message'=>'El correo electrónico o la contraseña son incorrectos, inténtelo de nuevo.'
    ]);

    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
