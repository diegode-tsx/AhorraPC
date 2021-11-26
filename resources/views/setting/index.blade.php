@extends('layouts.plantilla-'.$plantilla)

@php //borra el cache para que no entren dandole atras si no estan logueados
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp

@section('title','Configuración')
@section('styles')
<link rel="stylesheet" href="{{asset('css/setting.css')}}">   
@endsection

@section('logo')
    <div class="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('img/logo.png')}}" alt="">
        </a>
    </div>
@endsection
    
@section('content')
    <main>
        <h1>Preferencias</h1>
        <div class="content">
            <div class="change-pass">
                <div class="title">
                    <i class="far fa-lock-open"></i>
                    <h2>Cambiar contraseña</h2>
                </div>
                <form action="">
                    <div class="input">
                        <input type="password" name="actual-password" placeholder="Contraseña actual" required>
                        <i class="fas fa-key"></i>
                    </div>
                    <div class="input">
                        <input type="password" name="new_password" placeholder="Contraseña nueva" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="input">
                        <input type="password" name="new_password_confirmation" placeholder="Repetir contraseña" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="submit" value="Cambiar">
                </form>
            </div>

            <div class="notification">
                <div class="title">
                    <i class="far fa-bell"></i>
                    <h2>Notificaciones</h2>
                </div>
                <div class="checkbox">
                    <label for="alert">
                        Enviar notificaciones al correo cuando un producto marcado como favorito baje de precio
                        <input type="checkbox" name="alert" id="alert">
                        <div class="checkbox-box"></div>
                    </label>
                    
                </div>
            </div>

            <div class="log-out">
                <div class="title">
                    <a href="#">
                        <i class="far fa-power-off"></i>
                        <h2>Cerrar sesión</h2>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
