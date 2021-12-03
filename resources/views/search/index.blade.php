@extends('layouts.plantilla-'.$plantilla)

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


@section('content')
    <main>
        <div class="head">
            <h1 class="titulo-principal" id="titulo-pestañas">Tiendas</h1>
            <h1 class="titulo-principal" id="titulo-precio">Mejores Precios</h1>
            <a onclick="ActivarMenorPrecio()" href="#" id="btn-menorprecio" id="btn" class="txt-normal">Ver los productos mas baratos</a>
            <a href="#" onclick="ActivarPcmig()" class="txt-normal" id="btn-pestañas" id="btn">Ver los productos por tienda</a>
        </div>
        <div class="tab-container" id="tab-container">
            <button onclick="ActivarPcmig()" class="active btn-btn titulo-terciario" id="btn">PCMIG</button>
            <button onclick="ActivarCyberpuerta()" class=" btn-btn titulo-terciario" id="btn">CyberPuerta</button>
            <button onclick="ActivarDdtech()" class=" btn-btn titulo-terciario" id="btn">DDTech</button>
            <button onclick="ActivarPcel()" class=" btn-btn titulo-terciario" id="btn">PCEL</button>
            <button onclick="ActivarMercadolibre()" class=" btn-btn titulo-terciario" id="btn">MercadoLibre</button>
            <button onclick="ActivarAmazon()" class=" btn-btn titulo-terciario" id="btn">Amazon</button>
        </div>
        <h2 class="titulo-secundario producto-buscado">{{ $searchGlobal }}</h2>
        <div class="products-container" id="global">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            
            {{-- @foreach ($resultado as $item)
                <p>Precio {{$loop->index}}: {{$item->precio}}</p>
            @endforeach --}}
            {{-- Empieza resultados por precio --}}
            @foreach ($resultado as $item)
            
            <div class="card" id ="{{ $loop->index }}">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a class="xd"><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','{{ $item->tienda }}','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

        <div class="products-container" id="pcmig">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            {{-- Empieza PcMig --}}
            @foreach ($PcMig as $item)
            
            <div class="card" id ="{{ $loop->index }}">
                <div class="img-card">
                    <img src="{{$item->imagenLink}}">
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','1','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
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
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','2','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
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
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','3','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
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
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','6','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
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
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','5','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
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
                        <a href="{{$item->LinkCompra}}" target="_blank"><h3 class="product-name txt-tiny">{{$item->nombre}}</h3></a>
    
                        <p class="product-price txt-tiny">${{$item->precio}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->LinkCompra}}" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                        <a><i class="fas fa-heart" onclick="add_to_favorites('{{$item->precio}}','{{$item->nombre}}','{{$item->imagenLink}}','{{$item->LinkCompra}}','6','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
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
        <script src="{{asset('scripts/scriptpestañas.js')}}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </main>
@endsection