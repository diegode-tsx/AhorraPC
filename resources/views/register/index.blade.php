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
        @if (session('send'))
            <strong>{{session('send')}}</strong>
        @endif
        <form action="" class="form" method="POST">
            @csrf <!-- esta mierda es mortal xd-->
            <h1>Crea una cuenta</h1>
            <div class="input-group">
                @if ($errors->has('username'))
                        <span class="error">{{$errors->first('username')}}</span>
                @endif
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="text" name="username" placeholder="Usuario">
                    <i class="fas fa-user"></i>
                </div>
                @if ($errors->has('email'))
                        <span class="error">{{$errors->first('email')}}</span>
                @endif
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="email" name="email" placeholder="Correo">
                    <i class="fas fa-at"></i>
                </div>
                @error('password')
                        <strong class="error">{{$message}}</strong>
                @enderror
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="password" name="password" placeholder="Contraseña">
                    <i class="fas fa-key"></i>
                </div>
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="password" name="password_confirmation" placeholder="Repetir contraseña">
                    <i class="fas fa-key"></i>
                </div>
            </div>
            <input type="submit" value="Continuar" name="form_data">
            <div class="sign-in-out">
                ¿Ya tienes cuenta?
                <a href="{{route('login')}}">Inicia sesión</a>
            </div>
        </form>
    </main>

    <form method="POST">
        @csrf
        <input type="text" placeholder="Ingresa tu codigo" name="token">
        <br>
        <input type="submit" name="register">
    </form>
@endsection