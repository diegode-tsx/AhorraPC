@extends('layouts.plantilla-'.$plantilla)

@php //borra el cache para que no entren dandole atras si no estan logueados
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp

@section('title','Favoritos')
@section('styles')
<link rel="stylesheet" href="{{asset('css/favorite.css')}}">
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
            <h1 class="titulo-secundario">Favoritos</h1>
            <button class="txt-normal" id="cotizar">Cotizar seleccionados</button>
        </div>
        <div class="products-container">
            {{---------AQUÍ EMPIEZA LA ESTRUCTURA DEL CONTENEDOR DE CADA PRODUCTO----------}}
            @foreach ($favProduct as $item)
                
            
            <div class="card" id ="{{ $loop->iteration }}">
                <div class="img-card">
                    <img src="{{$item->url_image}}" alt="" tag="img">    <!--{{asset('img/ram.jpg')}}-->
                </div>

                <div class="card-details">
                    <div class="card-info">
                        <a href="{{$item->url_page}}"><h3 id="nombreProducto" class="product-name txt-tiny">{{$item->nomProducto}}</h3></a>
    
                        <p class="product-price txt-tiny">{{$item->price}}</p>
                    </div>
    
                    <div class="card-icons">
                        <a href="{{$item->url_page}}"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                        <div class="checkbox">
                            <label>
                                <a href="#"><i class="far fa-trash" onclick="eliminar_favorites('{{$item->price}}','{{$item->nomProducto}}','{{$item->url_image}}','{{$item->url_page}}','{{ csrf_token() }}','{{ route('search.addFavorite') }}')"></i></a>
                                <input type="checkbox" name ="CheckboxValidar">
                                <div class="checkbox-box"></div>
                            </label>
                        </div>
                    </div>
                    <div class="card-shop">
                        <p class="titulo-terciario">{{$item->nomPagina}}</p>
                    </div>
                </div>
            </div>
{{---------AQUÍ TERMINA----------}}
@endforeach
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <h2 class="titulo-terciario">Productos</h2>
                <div class="card">
                    <div class="card-img">
                        <img src="{{asset('img/ram.jpg')}}" alt="">
                    </div>
                    <div class="card-info">
                        <a href="#"><h3 class="product-name txt-tiny">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>
    
                        <p class="product-price txt-tiny">$3,269.00</p>
                    </div>
                </div>
                <p class="total txt-normal">Total: $3500</p>
                <i class="fas fa-times" id="close"></i>
            </div>
        </div>
    </main>
    <div class="d-flex justify-content-center">
        {{$favProduct->links()}}
    </div>
    <script src="{{asset('scripts/scriptConsulta.js')}}"></script>
    <script>
        var modal = document.getElementById("modal");
        var open = document.getElementById("cotizar");
        var close = document.getElementById("close");
        
        open.onclick = function(){
            const nicknames = document.querySelectorAll('[name="CheckboxValidar"]');
            var productosColeccion = new Array();
            for(let i = 0; i < nicknames.length; i++){
                if(nicknames[i].checked){
                    divGlobal=nicknames[i].parentNode.parentNode.parentNode.parentNode;
                    nombre=divGlobal.getElementsByClassName('product-name txt-tiny')[0].innerHTML;
                    precio = divGlobal.getElementsByClassName('product-price txt-tiny')[0].innerHTML;
                    linkCompra = divGlobal.getElementsByClassName('card-info')[0].getElementsByTagName('a')[0].getAttribute('href');
                    img = divGlobal.parentNode.getElementsByClassName('img-card')[0].getElementsByTagName('img')[0].getAttribute('src');
                    producto = [nombre, precio, img, linkCompra];
                    productosColeccion.push(producto);
                }
            }
            
            modal.style.display = "block";
            for(var arreglo in productosColeccion) {
                console.log(productosColeccion[arreglo][0]);
            }
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
   {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var num = 300;
        var num2 = 3200;
        var xd = '<div class="card">\
                <div class="img-card">\
                    <img src="{{asset("img/ram.jpg")}}" alt="">\
                </div>\
                <div class="card-details">\
                    <div class="card-info">\
                        <a href="#"><h3 class="product-name">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3></a>\
                        <p class="product-price">$3,269.00</p>\
                    </div>\
                </div>\
            </div>'
            const link1 = document.createElement('a');
const link2 = document.createElement('a');
link1.innerHTML = 'How do I logout?';
link2.innerHTML = "How do I example?";

const container = document.createElement("div");
// You could also use container.innerHTML to set the content.
container.append(link1);
container.append(document.createElement("br"));
container.append(link2);
            let frutas = [xd+"<s", "/s"+xd]
        Swal.fire({
  title: '<strong>HTML <u class="prueba">example</u></strong>',
  icon: 'info',
  html: container,
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
  cancelButtonAriaLabel: 'Thumbs down'
})
    </script> --}}
@endsection