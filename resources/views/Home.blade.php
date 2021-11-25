@extends('layouts.plantilla-'.$plantilla)<!--se escribe la variable recivida del controlador tal cual-->

@php //borra el cache para que no entren dandole atras si no estan logueados
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp

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