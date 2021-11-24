@extends('layouts.plantilla-'.$plantilla)<!--se escribe la variable recivida del controlador tal cual-->

@section('styles')
<link rel="stylesheet" href="{{asset('css/home.css')}}">

@section('title','Inicio')
    
@section('content')
    <main>
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" alt="">
        </div>

        <form action="{{route('search')}}" method="POST">
            @csrf
            <div class="buscador-container">
                <input type="text" name="busqueda">
                <i class="fas fa-search"></i>
            </div>
            <input type="submit" value="Buscar">
        </form>

        <h1>Arma tu<span class="red"> PC </span>ideal y<span class="red"> ahorra </span>dinero</h1>
    </main>
@endsection