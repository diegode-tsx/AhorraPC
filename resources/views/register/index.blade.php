@extends('layouts.plantilla-defecto')

@section('title','Registro')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
    
@section('logo')
    <div class="logo">
        <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
    </div>
@endsection


@section('content')
    <main>
        <div class="form">
            <form action="" method="POST">
                @csrf <!-- esta mierda es mortal xd-->
                <h1 class="titulo-principal">Crea una cuenta</h1>
                <div class="input-group">
                    @if ($errors->has('username'))
                            <span class="error txt-tiny">{{$errors->first('username')}}</span>
                    @endif
                    <span class="espaciado txt-tiny">.</span>
                    <div class="input">
                        <input type="text" name="username" class="txt-tiny" placeholder="Usuario">
                        <i class="fas fa-user"></i>
                    </div>
                    @if ($errors->has('email'))
                            <span class="error txt-tiny">{{$errors->first('email')}}</span>
                    @endif
                    <span class="espaciado txt-tiny">.</span>
                    <div class="input">
                        <input type="email" name="email" class="txt-tiny" placeholder="Correo">
                        <i class="fas fa-at"></i>
                    </div>
                    @error('password')
                            <strong class="error txt-tiny">{{$message}}</strong>
                    @enderror
                    <span class="espaciado txt-tiny">.</span>
                    <div class="input">
                        <input type="password" name="password" class="txt-tiny" placeholder="Contraseña">
                        <i class="fas fa-key"></i>
                    </div>
                    <span class="espaciado txt-tiny">.</span>
                    <div class="input">
                        <input type="password" name="password_confirmation" class="txt-tiny" placeholder="Repetir contraseña">
                        <i class="fas fa-key"></i>
                    </div>
                </div>
                <input type="submit" value="Continuar" name="form_data" class="txt-normal">
            </form>
            <form method="POST">
                @csrf
                <input type="submit" name="token_conf" class="txt-normal" value="Ya tengo codigo" style="margin-top: 10px !important;">
            </form> 
            <div class="sign-in-out txt-tiny">
                ¿Ya tienes cuenta?
                <a href="{{route('login')}}">Inicia sesión</a>
            </div>
        </div>
       
    </main>
@if (session('send'))
    

    <div class="verificacion-background">
        <form method="POST" class="verificacion-email">
            @csrf
            <h2 class="titulo-secundario" style="color: var(--negro);">Ingresa el código enviado a tu correo </h2>
            
            <div class="input">
                <input type="text" placeholder="Código" name="token">
            </div>
            <input type="submit" name="register">
        </form>
    </div>  
    @endif
@endsection

