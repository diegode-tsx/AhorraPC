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
            <div class="input-group">
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="text" name="code" placeholder="Código" required>
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="password" name="password" placeholder="Contraseña nueva" required>
                    <i class="fas fa-lock"></i>
                </div>
                <span class="espaciado">.</span>
                <div class="input">
                    <input type="password" name="password_confirmation" placeholder="Repetir contraseña" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>
            <input type="submit" value="Listo">
            <div class="text">
                <a href="{{route('home')}}">Regresar</a>
            </div>
        </form>
    </main>
@endsection
{{--<br><br>
<form  method="POST">
    @csrf

    @if ($errors->has('token'))
        <span>{{$errors->first('token')}}</span>
    @endif
    <input type="text" name="token" placeholder="Ingrese su codigo" autofocus required>
    @if (session('fail_pass'))
        <strong>{{session('fail_pass')}}</strong>
    @endif <br><br>

    <input type="password" name="new_password" placeholder="Contraseña nueva" required> <br> <br>

    <input type="password" name="new_password_confirmation" placeholder="Contraseña nueva" required> <br> <br>
    

    <input type="submit" value="Cambiar contraseña">
    @if ($errors->has('new_password'))
        <span>{{$errors->first('new_password')}}</span>
    @endif
    
</form><br>
<a href="{{route('home')}}">Regresar</a>--}}