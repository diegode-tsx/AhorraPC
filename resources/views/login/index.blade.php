@extends('layouts.plantilla-defecto')

@section('title','Inicio de sesión')
    
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
            <h1>Inicia sesión</h1>
            <div class="input-group">
                <div class="input">
                    <input type="text" name="user" placeholder="Usuario">
                    <i class="fas fa-user"></i>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Contraseña">
                    <i class="fas fa-key"></i>
                </div>
                <a href="#" class="forgot">¿Olvidaste tu contraseña?</a>
            </div>
            <input type="submit" value="Ingresar">
            <div class="sign-in-out">
                ¿No tienes cuenta?
                <a href="{{route('register')}}">Regístrate ahora</a>
            </div>
        </form>
    </main>
@endsection