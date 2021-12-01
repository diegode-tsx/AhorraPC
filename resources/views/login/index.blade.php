@extends('layouts.plantilla-defecto')

@section('title','Inicio de sesión')
    
@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
    
@section('logo')
    <div class="logo">
        <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
    </div>
@endsection


@section('content')
    <main>
        <form class="form" method="POST">
            @csrf <!-- esta mierda es mortal xd-->
            <h1 class="titulo-principal">Inicia sesión</h1>
            <div class="input-group">
                @error('message')
                <strong class="error txt-tiny">{{$message}}</strong><!--Mensaje de error usuario o contraseña-->
                @enderror
                @if (session('email_v'))
                    <strong class="error txt-tiny"><center>{{session('email_v')}}</center></strong>
                @endif
                <span class="espaciado txt-tiny">.</span>
                <div class="input">
                    <input type="text" name="username" placeholder="Usuario" class="txt-tiny" required>
                    <i class="fas fa-user"></i>
                </div>
                <span class="espaciado txt-tiny">.</span>
                <div class="input">
                    <input type="password" name="password" id="pass" placeholder="Contraseña" class="txt-tiny" required> 
                    
                    <i class="fas fa-key"></i>
                </div>
                <a href="{{route('password')}}" class="forgot txt-tiny">¿Olvidaste tu contraseña?</a>
            </div>
            <input type="submit" value="Ingresar" class="txt-normal">
            <div class="sign-in-out txt-tiny">
                ¿No tienes cuenta?
                <a href="{{route('register')}}">Regístrate ahora</a>
            </div>
        </form>
    </main>
@endsection