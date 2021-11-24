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
        <form class="registration-login" method="POST">
            @csrf <!-- esta mierda es mortal xd-->
            <h1>Inicia sesión</h1>
            <span class="espaciado">.</span>
            <div class="input-group">
                <div class="input">
                    <input type="text" name="username" placeholder="Usuario" required>
                    <i class="fas fa-user"></i>
                </div>
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="password" name="password" placeholder="Contraseña" required>
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