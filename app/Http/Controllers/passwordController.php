<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\password_reset;
use App\Mail\RecoveryMailable;//pa enviar correo new RecoveryMailable
use Illuminate\Support\Facades\Mail;;//pa enviar correo MAIL::to
use Illuminate\Support\Facades\DB;

class passwordController extends Controller
{
    function index(){
        
        return view('password.index');
        }

    function request(){
        $token= Str::random(12);
        $mail= $_POST['email'];

        $verify = DB::table('password_resets')->select('email', 'id')->where('email','=',$mail)->get();

        $user = DB::table('users')->select('email')->where('email','=',$mail)->get();

        if(isset($user->first()->email)){//comprueba que el correo este registrado
        if(isset($verify->first()->email)){//decide si actualizar el toquen o crearlo


            //actualiza el toquen
            $id = $verify->first()->id;
            $recovery = Password_reset::find($id);
            $recovery->email = $mail;
            $recovery->token = $token;
            $recovery->save();
            
            Mail::to($mail)->send(new RecoveryMailable($token));
            
            return back()->with('status','Se ha enviado un correo a la direccion que proporcionaste');

        }else{ //crea un nuevo token
            
        $recovery = new Password_reset;
        $recovery->email = $mail;
        $recovery->token = $token;
        $recovery->save();
        Mail::to($mail)->send(new RecoveryMailable($token));
        

        
        return back()->with('status','Se ha enviado un correo a la direccion que proporcionaste');

        }}


        return back()->with('fail','El correo ingresado no esta registrado');
    }

    


}
