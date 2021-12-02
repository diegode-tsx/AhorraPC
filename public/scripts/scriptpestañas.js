// ANIMACION DE LOS CARDS DE ABAJO HACIA ARRIBA

let animado = document.querySelectorAll(".card");
let conta = [animado.length];


function MostrarScroll(){
    let scrollTop = document.documentElement.scrollTop;
    for (var i=0; i<animado.length; i++){
        let alturaAnimado = animado[i].offsetTop;

        if(alturaAnimado -300< scrollTop){
            animado[i].style.opacity = 1;
            animado[i].classList.add("mostrarArriba");
        }
        // if(i == 7){
        //     clearInterval(visualizar);
        // }
   
    }
}




//SABER QUE BOTON ESTA ACTIVADO

document.querySelectorAll(".tab-container button").forEach(button=>{
	button.addEventListener("click",(ev)=>{
		 const parent = button.parentNode;
		// const grantParent = parent.parentNode;
		// // const container = grantParent.querySelector(".tabs-container");
		//  const childrenList = Array.from(parent.children);
		// const index = childrenList.indexOf(button);
		// container.style.transform = `translatex(-${index * 100}%`;

		parent.querySelectorAll("button.active")
		.forEach(activeBtn => activeBtn.classList.remove("active"));

		button.classList.add("active");
		
	})
})



if (document.querySelectorAll(".tab-container .active")) {
	console.log("Esto solo se ejecuta si el elemento con id 'nombre' tiene la clase 'clase2'")
	MostrarScroll();
  } else {
	console.log("Se ejecuta si no la tiene");
  }




// SEPARAR POR PESTAÑAS
var pcmig = document.getElementById("pcmig");
var cyberpuerta = document.getElementById("cyberpuerta");
var ddtech = document.getElementById("ddtech");
var pcel = document.getElementById("pcel");
var mercadolibre = document.getElementById("mercadolibre");
var amazon = document.getElementById("amazon");
var todo = document.getElementById("global");
var pestañas = document.getElementById("btn-pestañas");
var menorprecio = document.getElementById("btn-menorprecio");
var titulotiendas = document.getElementById("titulo-pestañas");
var titulo_menor_precio = document.getElementById("titulo-precio");
var tab_container = document.getElementById("tab-container");

window.onload = ActivarPcmig();
window.onload = MostrarScroll();
function ActivarPcmig(){

	var list2;
	list2 = document.querySelectorAll(".tab-container button");
	for (var i = 0; i < list2.length; ++i) {
	   list2[i].classList.remove('desactive');
	}


	pcmig.style.display = 'grid';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	todo.style.display = 'none';
	pestañas.style.display = 'none';
	menorprecio.style.display = "grid";
	titulotiendas.style.display = 'grid';
	titulo_menor_precio.style.display = 'none';
	tab_container.style.display = 'flex';
	MostrarScroll();
}

function ActivarCyberpuerta(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'grid';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	todo.style.display = 'none';
	pestañas.style.display = 'none';
	MostrarScroll();
}

function ActivarDdtech(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'grid';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	todo.style.display = 'none';
	pestañas.style.display = 'none';
	MostrarScroll();
}

function ActivarPcel(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'grid';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	todo.style.display = 'none';
	pestañas.style.display = 'none';
	MostrarScroll();
}

function ActivarMercadolibre(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'grid';
	amazon.style.display = 'none';
	todo.style.display = 'none';
	pestañas.style.display = 'none';
	MostrarScroll();
}

function ActivarAmazon(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'grid';
	todo.style.display = 'none';
	pestañas.style.display = 'none';
	MostrarScroll();
}

function ActivarMenorPrecio(){

	var list;
	list = document.querySelectorAll(".tab-container button");
	for (var i = 0; i < list.length; ++i) {
	   list[i].classList.add('desactive');
	}

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	todo.style.display = 'grid';
	pestañas.style.display = 'grid';
	menorprecio.style.display = "none";
	titulotiendas.style.display = 'none';
	titulo_menor_precio.style.display = 'grid';
	tab_container.style.display= 'none';
	MostrarScroll();
}


function add_to_favorites(precio,nomProduct,linkImagen,linkCompra,tienda, token, ruta) {
	
	$.ajax({
		url: ruta,
		type: "POST",
		data: {
			precio: precio,//
			nomProduct: nomProduct,//
			linkImagen: linkImagen,
			linkCompra: linkCompra,
			tienda: tienda,//
			_token: token,
		},
		success: function(data) {
			if (data.success) {
				console.log("Se agrego a favoritos");
			}else{
				
			}
		}

	});
}




