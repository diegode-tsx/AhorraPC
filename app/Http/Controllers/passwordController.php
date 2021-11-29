<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\password_reset;
use App\Mail\RecoveryMailable;//pa enviar correo new RecoveryMailable
use Illuminate\Support\Facades\Mail;;//pa enviar correo MAIL::to
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSetting;

class passwordController extends Controller
{
    function index(){
        
        return view('password.index');
        }

    function request(){
        $token= Str::random(12);
        $mail= $_POST['email'];

        $verify = DB::table('password_resets')->select('email')->where('email','=',$mail)->get();

        $user = DB::table('users')->select('email')->where('email','=',$mail)->get();

        if(isset($user->first()->email)){//comprueba que el correo este registrado
        if(isset($verify->first()->email)){//decide si actualizar el toquen o crearlo


            //actualiza el toquen
            DB::table('password_resets')->where('email','=',$mail)->update([
                'email'=>$mail,
                'token'=>$token

            ]);

            Mail::to($mail)->send(new RecoveryMailable($token));
            return back()->with('status','Se ha enviado un correo a la direccion que proporcionaste');

        }else{ //crea un nuevo token
            
        $email = new Password_reset;
        $email->email = $mail;
        $email->token = $token;
        $email->save();
        Mail::to($mail)->send(new RecoveryMailable($token));

        return back()->with('status','Se ha enviado un correo a la direccion que proporcionaste');

        }}


        return back()->with('fail','El correo ingresado no esta registrado');
    }

    function reset_pass(StoreSetting $request){
        $token = $_POST['token'];
        $verify = DB::table('password_resets')->select('token','email')->where('token','=',$token)->get();
        if(isset($verify->first()->token)){
            $token_db = $verify->first()->token;

            if($token_db==$token){
                $password = $_POST['new_password'];
                $mail = $verify->first()->email;
                DB::table('users')->where('email','=',$mail)->update(['password'=>$password]);
                DB::table('password_resets')->where('email','=',$mail)->delete();
                return redirect()->to('login');
            }
        }
        return back()->with('fail_pass','El codigo ingresado es incorrecto');

    }


}
