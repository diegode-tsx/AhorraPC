@extends('layouts.plantilla-defecto')

@section('title','Registro')

@section('styles')
<link rel="stylesheet" href="{{asset('css/register-login.css')}}">
    
@section('logo')
    <div class="logo">
        <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
    </div>
@endsection


@section('content')
    <main>
        <form action="" class="registration-login">
            <h1>Crea una cuenta</h1>
            <div class="input-group">
                <div class="input">
                    <input type="text" name="user" placeholder="Usuario">
                    <i class="fas fa-user"></i>
                </div>
                <div class="input">
                    <input type="email" name="email" placeholder="Correo">
                    <i class="fas fa-at"></i>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Contraseña">
                    <i class="fas fa-key"></i>
                </div>
                <div class="input">
                    <input type="password" name="r-password" placeholder="Repetir contraseña">
                    <i class="fas fa-key"></i>
                </div>
            </div>
            <input type="submit" value="Continuar">
            <div class="sign-in-out">
                ¿Ya tienes cuenta?
                <a href="{{route('login')}}">Inicia sesión</a>
            </div>
        </form>
    </main>
@endsection