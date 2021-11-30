@extends('layouts.plantilla-defecto')

@section('title','Recuperación')
    
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
            <h1 class="txt-principal">Recuperar contraseña</h1>
            <p class="txt-tiny">Ingresa el correo registrado a tu cuenta</p>
            <div class="input-group">
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="email" name="email" placeholder="Correo" required>
                    <i class="fas fa-at"></i>
                </div>
            </div>
            <input type="submit" value="Enviar código">
            <div class="text">
                <a href="{{route('home')}}">Regresar</a>
                <a href="{{route('code')}}">Ya tengo un código</a>
            </div>
        </form>
    </main>
    {{--<h1>Recuperar contraseña</h1>
    <br>
    @if (session('fail'))
        <strong>{{session('fail')}}</strong>
    @endif
    @if (session('status'))
        <strong>{{session('status')}}</strong>
    @endif
    <form action="{{route('password.request')}}" method="POST">
    @csrf

    <input type="email" name="email" autofocus required>
    <br><br>
    <input type="submit" value="Recuperar">

    </form>

    <a href="{{route('home')}}">Regresar</a>

    <a href="{{route('code')}}">Tengo un codigo</a>--}}
@endsection