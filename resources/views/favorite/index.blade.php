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
            <div class="modal-content" id="modal-content">
                <h2 class="titulo-terciario">Productos</h2>
                <h3></h3>
                {{-- <div class="card">
                    <div class="card-img">
                        <img src="{{asset('img/ram.jpg')}}" alt="">
                    </div>
                    <div class="card-info">
                        <h3 class="product-name txt-tiny">Kit Memoria RAM Patriot Viper Steel RGB DDR4, 3600MHz, 32GB (2 x 16GB), Non-ECC, CL20, XMP</h3>
    
                        <p class="product-price txt-tiny">$3,269.00</p>
                    </div>
                </div> --}}
                {{-- <p class="total txt-normal">Total: $3500</p> --}}
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
        var contenedor = document.getElementById("modal-content");
        var segundo = document.getElementById('modal-content').getElementsByTagName('h3')[0];

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
            var cantidad = 0;
            for(var arrprecio in productosColeccion){
                    cantidad = cantidad + parseFloat(productosColeccion[arrprecio][1]);
                }
                var conDecimal = cantidad.toFixed(2); 
            for(var arreglo in productosColeccion) {
                var div_card = document.createElement("div");
                div_card.className = "card card2";
                contenedor.appendChild(div_card);
                document.getElementById('modal-content').insertBefore(div_card,segundo);
                var div_card_img = document.createElement("div");
                div_card_img.className = "card-img";
                // IMAGEN
                var img_producto = document.createElement("img");
                img_producto.src = productosColeccion[arreglo][2];
                //Hago hijo a div_card_img de div_card
                div_card.appendChild(div_card_img);
                div_card_img.appendChild(img_producto);

                var div_card_info = document.createElement("div");
                div_card_info.className = "card-info";
                var nom_producto = document.createElement("h3");
                nom_producto.className = "product-name txt-tiny";
                nom_producto.innerHTML = productosColeccion[arreglo][0];
                //Hago hijo a div_card_info de div_card
                div_card.appendChild(div_card_info);
                div_card_info.appendChild(nom_producto);

                var pre_producto = document.createElement("p");
                pre_producto.className = "product-price txt-tiny";
                pre_producto.innerHTML = productosColeccion[arreglo][1];
                div_card_info.appendChild(pre_producto);
            }
            var total = document.createElement("p");
                total.className = "total txt-normal total txt-normal2";
                contenedor.appendChild(total);
                total.innerHTML = conDecimal;
        }

        close.onclick = function(){
            modal.style.display = "none";
            var elements = document.getElementsByClassName('card2');
        while(elements.length > 0){
        elements[0].parentNode.removeChild(elements[0]);
        }

        var elements2 = document.getElementsByClassName('total txt-normal2');
        while(elements2.length > 0){
        elements2[0].parentNode.removeChild(elements2[0]);
        }
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