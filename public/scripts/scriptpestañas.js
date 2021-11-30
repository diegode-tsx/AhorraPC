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



// SEPARAR POR PESTAÑAS

var pcmig = document.getElementById("pcmig");
var cyberpuerta = document.getElementById("cyberpuerta");
var ddtech = document.getElementById("ddtech");
var pcel = document.getElementById("pcel");
var mercadolibre = document.getElementById("mercadolibre");
var amazon = document.getElementById("amazon");

ActivarPcmig();

function ActivarPcmig(){

	pcmig.style.display = 'grid';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	MostrarScroll();
}

function ActivarCyberpuerta(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'grid';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	MostrarScroll();
}

function ActivarDdtech(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'grid';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
	MostrarScroll();
}

function ActivarPcel(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'grid';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'none';
}

function ActivarMercadolibre(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'grid';
	amazon.style.display = 'none';
}

function ActivarAmazon(){

	pcmig.style.display = 'none';
	cyberpuerta.style.display = 'none';
	ddtech.style.display = 'none';
	pcel.style.display = 'none';
	mercadolibre.style.display = 'none';
	amazon.style.display = 'grid';
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



