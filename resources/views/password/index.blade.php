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
            @csrf
            <h1 class="titulo-principal">Recuperar contraseña</h1>
            <div class="input-group">
                @if (session('fail'))
                <strong class="txt-tiny error">{{session('fail')}}</strong> <!--password controller return whit('fail')-->
                @endif
                @if (session('status'))
                <strong class="txt-tiny error">{{session('status')}}</strong>  <!--password controller return whit('status')-->
                @endif
                <span class="espaciado txt-tiny">.</span>
                <div class="input">
                    <input type="email" name="email" class="txt-tiny" placeholder="Correo registrado a tu cuenta" required>
                    <i class="fas fa-at"></i>
                </div>
            </div>
            <input type="submit" value="Enviar código" class="txt-normal">
            <div class="text">
                <a href="{{route('login')}}" class="txt-tiny">Regresar</a>
                <a href="{{route('code')}}" class="txt-tiny">Ya tengo un código</a>
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