<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser;
use App\Mail\RegisterMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class registerController extends Controller
{
    function index()
    {
        return view('register.index');
    }

    public function store(StoreUser $request){
        

        

        if($request->has('form_data')){
            $token = Str::random(12);
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

           $user = new User;
           $user->username = $username;
           $user->email = $email;
           $user->email_confirm = $token;
           $user->password = $password;
           $user->save();
           
           Mail::to($email)->send(new RegisterMailable($token,$username));
           //auth()->login($user);

           return back()->with('send', 'Se ha enviado un codigo de confirmacion a su correo'); 
           
        }

        if($request->has('register')){
            $token = $_POST['token'];
            $verify = DB::table('users')->where('email_confirm','=',$token)->select('email_confirm','id')->get();

            if(isset($verify->first()->email_confirm)){

                $confirmed = $verify->first()->email_confirm;
                $id = $verify->first()->id;
                if($token==$confirmed){

                    $user = User::find($id);
                    $user->email_confirm = null;
                    $user->save();
                    auth()->login($user);
                }
                return back()->with('failed_token', 'El token es incorrecto');
            }
            return back()->with('failed_token', 'El token es incorrecto');
        }

        if($request->has('token_conf')){
            return back()->with('send', 'Se ha enviado un codigo de confirmacion a su correo'); 
        }
        

    }

    
}
