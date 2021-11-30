<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class password_resetController extends Controller
{
    function index(){
        return view('password_reset.index');
    }

    function recovery(StoreRecovery $request){

        $token = $_POST['token'];
        $password = $_POST['new_password'];
        $verify = DB::table('password_resets')->where('token','=',$token)->select('token','email')->get();
        
        if(isset($verify->first()->token)){
            $token_db = $verify->first()->token;
            if($token==$token_db){

                $mail = $verify->first()->email;
                $id = DB::table('users')->where('email','=',$mail)->select('id');
                $id= $id->first()->id;
                
                $user = User::find($id);
                $user->password=$password;
                $user->save();
                
                DB::table('password_resets')->where('email','=',$mail)->delete();
                return redirect()->to('login');
                
            }else{
                

        
    }
    return "xd";
        
    }

    }
}
