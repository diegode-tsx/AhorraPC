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
                <span class="txt-tiny error">{{session('fail')}}</span>
                 @endif
                <span class="espaciado txt-tiny">.</span>
                <div class="input">
                    <input type="text" name="token" class="txt-tiny" placeholder="Código" required>
                    <i class="fas fa-shield-alt"></i>
                </div>
                @if ($errors->has('new_password'))
                    <span class="error txt-tiny">{{$errors->first('new_password')}}</span> <!--contraseña confirmation -->
                @endif
                <span class="espaciado txt-tiny">.</span>
                <div class="input">
                    <input type="password" name="new_password" class="txt-tiny" placeholder="Contraseña nueva" required>
                    <i class="fas fa-lock"></i>
                </div>
                <span class="espaciado txt-tiny">.</span>
                <div class="input">
                    <input type="password" name="new_password_confirmation" class="txt-tiny" placeholder="Repetir contraseña" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>
            <span class="espaciado txt-tiny">.</span>
            <input type="submit" value="Listo" class="txt-normal">
            <div class="text">
                <a href="{{route('password')}}" class="txt-tiny">Regresar</a>
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