@extends('layouts.plantilla-defecto')

@section('title','Busqueda')

@section('logo')
    <div class="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('img/logo.png')}}" alt="">
        </a>
    </div>
@endsection

@section('content')
    <main>
        <div class="product-banner">
            <div class="banner">
                <h2>CyberPuerta</h2>
            </div>
            <p>Ver los productos más baratos</p>
        </div>
        <div class="products-container">
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-info">
                    <h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3>

                    <p class="product-price">$3,269.00</p>
                </div>

                <div class="card-icons">
                    <i class="fas fa-shopping-cart"></i>
                    <i class="fas fa-heart"></i>
                </div>
            </div>
        </div>
    </main>
@endsection