@extends('layouts.plantilla-usuario')

@section('title','Busqueda')
@section('styles')
<link rel="stylesheet" href="{{asset('css/search.css')}}">
    
@endsection

@section('logo')
    <div class="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('img/logo.png')}}" alt="">
        </a>
    </div>
@endsection



@foreach ($suma as $item)
    <h1>{{$item->$nombre}}</h5>
@endforeach

    {{-- <php echo ($xcosa); ?> Aqui pasaba el parametro de tipo texto y agarro--}} 

    <?php print_r ($suma); ?> <!--Aqui imprimo el array pero sale vacii al igual que con el foreach-->




@section('content')
    <main>
        <div class="product-banner">
            <div class="banner">
                <h2>CyberPuerta</h2>
            </div>
            <a href="#">Ver los productos más baratos</a>
        </div>

        <div class="products-container">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            {{---------AQUÍ TERMINA----------}}
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="img-card">
                    <img src="{{asset('img/ram.jpg')}}" alt="">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price">$3,269.00</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="pagination">
            <li><a href="#" class="prev">< Atrás</a></li>
            <li class="page-number active"><a href="#">1</a></li>
            <li class="page-number"><a href="#">2</a></li>
            <li class="page-number"><a href="#">3</a></li>
            <li class="page-number"><a href="#">4</a></li>
            <li class="page-number"><a href="#">5</a></li>
            <li class="page-number"><a href="#">6</a></li>
            <li><a href="#" class="next">Siguiente ></a></li>
        </ul>
    </main>
@endsection