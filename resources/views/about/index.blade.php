@extends('layouts.plantilla-'.$plantilla)

@php //borra el cache para que no entren dandole atras si no estan logueados
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp

@section('title','Nosotros')
@section('styles')
<link rel="stylesheet" href="{{asset('css/about.css')}}">   
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
        <h1 class="titulo-principal">AhorraPC es tu herramienta <span class="red">ideal</span> para ahorrar <span class="red">tiempo</span> y <span class="red">dinero</span></h1>

        <div class="features-container">
            <div class="feature first">
                <img src="{{asset('img/hardware.png')}}" alt="">
                <p class="txt-normal">Busca componentes de computadoras en distintas páginas</p>
            </div>
            <div class="feature second">
                <img src="{{asset('img/online-shopping.png')}}" alt="">
                <p class="txt-normal">Revisa los resultados de las tiendas de tu preferencia</p>
            </div>
            <div class="feature third">
                <img src="{{asset('img/favorite.png')}}" alt="">
                <p class="txt-normal">Guarda tus favoritos para comprar más tarde</p>
            </div>
            <div class="feature fourth">
                <img src="{{asset('img/cheap.png')}}" alt="">
                <p class="txt-normal">Cotiza tus productos agregados a favoritos</p>    
            </div>
        </div>
    </main>
@endsection