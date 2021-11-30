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
        {{-- <div class="tab-container">
            <button onclick="ActivarPcmig()" class="active">PcMig</button>
            <button onclick="ActivarCyberpuerta()">CyberPuerta</button>
            <button onclick="ActivarDdtech()">DDTech</button>
            <button onclick="ActivarPcel()">pcCel</button>
            <button onclick="ActivarMercadolibre()">MercadoLibre</button>
            <button onclick="ActivarAmazon()">Amazon</button>
        </div> --}}

        <div class="products-container" id="pcmig">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza PcMig --}}
            @foreach ($PcMig as $item)
            
            <div class="card">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">{{$item->nombre}}</h3></a>
    
                        <p class="product-price">{{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Termina PcMig --}}
            {{---------AQUÍ TERMINA----------}}
        </div>

        <div class="products-container" id="cyberpuerta">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza CyberPuerta --}}
            @foreach ($cyberpuerta as $item)
            
            <div class="card">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">{{$item->nombre}}</h3></a>
    
                        <p class="product-price">{{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Termina CyberPuerta --}}
            {{---------AQUÍ TERMINA----------}}
        </div>
        
        <div class="products-container" id="ddtech">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza DDTech --}}
            @foreach ($ddtech as $item)
            
            <div class="card">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">{{$item->nombre}}</h3></a>
    
                        <p class="product-price">{{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Termina DDTech --}}
            {{---------AQUÍ TERMINA----------}}
        </div>   

        <div class="products-container" id="pcel">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza PCEL --}}
            @foreach ($pcCel as $item)
            
            <div class="card">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">{{$item->nombre}}</h3></a>
    
                        <p class="product-price">{{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Termina PCEL --}}
            {{---------AQUÍ TERMINA----------}}
        </div>   

        <div class="products-container" id="mercadolibre">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza MercadoLibre --}}
            @foreach ($mercadolibre as $item)
            
            <div class="card">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">{{$item->nombre}}</h3></a>
    
                        <p class="product-price">{{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Termina MercadoLibre --}}
            {{---------AQUÍ TERMINA----------}}
        </div>   


        <div class="products-container" id="amazon">
            @foreach ($amazon as $item)
            
            <div class="card">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">{{$item->nombre}}</h3></a>
    
                        <p class="product-price">{{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>  
        {{--<ul class="pagination">
            <li><a href="#" class="prev">< Atrás</a></li>
            <li class="page-number active"><a href="#">1</a></li>
            <li class="page-number"><a href="#">2</a></li>
            <li class="page-number"><a href="#">3</a></li>
            <li class="page-number"><a href="#">4</a></li>
            <li class="page-number"><a href="#">5</a></li>
            <li class="page-number"><a href="#">6</a></li>
            <li><a href="#" class="next">Siguiente ></a></li>
        </ul>--}}
        {{-- <script src="{{asset('scripts/scriptpestañas.js')}}"></script> --}}
        
    </main>
@endsection