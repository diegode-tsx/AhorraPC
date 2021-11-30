@extends('layouts.plantilla-'.$plantilla)

@section('title','Busqueda')
@section('styles')
<link rel="stylesheet" href="{{asset('css/search2.css')}}">
    
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
            <h1>Search2</h1>

        <div class="products-container" id="cyberpuerta">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza CyberPuerta --}}
            
            @if ($xd)
                Hay elemento
            @else
                No hay
            @endif
            <div class="card">
                <div class="img-card">
                    <img src="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">sgdhsetbeba</h3></a>
    
                        <p class="product-price">9778</p>
                    </div>
    
                    <div class="card-icons">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            
            {{-- Termina CyberPuerta --}}
            {{---------AQUÍ TERMINA----------}}
        </div>
        
        <div class="products-container" id="ddtech">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza DDTech --}}
            
            
            <div class="card">
                <div class="img-card">
                    <img src="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">sggsdgsgdczc</h3></a>
    
                        <p class="product-price">6765</p>
                    </div>
    
                    <div class="card-icons">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            
            {{-- Termina DDTech --}}
            {{---------AQUÍ TERMINA----------}}
        </div>   

        <div class="products-container" id="pcel">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza PCEL --}}
            
            <div class="card">
                <div class="img-card">
                    <img src="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Memoria ram No se que xxs ssaas</h3></a>
    
                        <p class="product-price">56565</p>
                    </div>
    
                    <div class="card-icons">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            
            {{-- Termina PCEL --}}
            {{---------AQUÍ TERMINA----------}}
        </div>   

        
        
        {{-- <script src="{{asset('scripts/scriptpestañas.js')}}"></script> --}}
        
    </main>
@endsection