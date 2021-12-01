<?php

namespace App\Http\Controllers;
require 'simple_html_dom.php';
//use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use App\MyClasses\ProductoClass;
use Exception;
use Goutte\Client;
use Illuminate\Support\Facades\Auth;

class searchController extends Controller
{
    // var $ListProduCyberPuertav2;//Lista de productos de la categoria CyberPuerta
     Public $ListProduDdTechv2 = [];
     Public $ListProduPcMigv2 = [];
     Public $ListProduPcelv2 = [];
     static $ListProduCyberPuertav2=[];
    function viewSearch2(){
        
        

        if(Auth::check()){//si el usuario esta logeado usara tal plantilla
            $plantilla='usuario';
        }else{
            $plantilla='defecto';
        }
        $cyberResult = self:: $ListProduCyberPuertav2;
        return   /* $request->all() */ view('search2.index',compact('cyberResult'), compact('plantilla'));
    }

    function index(Request $request, Client $client)
    {
        $searchGlobal = $request->input('busqueda');
        $search = str_replace(' ', '+', $searchGlobal);
        $search2 = str_replace(' ', '%20', $searchGlobal);
        $search3 = str_replace(' ', '-', $searchGlobal);
        $identificador = 1;
        $amz_str1="https://www.amazon.com.mx/s?k=";
        $amz_str2="&ref=nb_sb_noss_2";

        $amz_query=$amz_str1.$search2.$amz_str2;
        $cyberpuertaProductos = file_get_html('https://www.cyberpuerta.mx/index.php?cl=search&searchparam='.$search);
        $pcCelProductos=file_get_html('https://pcel.com/index.php?route=product/search&filter_name='.$search2);
        $amz_query=$amz_str1.$search2.$amz_str2;
        //$digitaLifeProductos=file_get_html('https://www.digitalife.com.mx/buscar/t_ryzen-3600');
        $pcMigProductos=file_get_html('https://pcmig.com.mx/?s='.$search.'&post_type=product');
        $ddTechProductos=file_get_html('https://ddtech.mx/buscar/'.$search);
        $mercLibreProductos=file_get_html('https://listado.mercadolibre.com.mx/'.$search3);
        $amazonProductos=file_get_html($amz_query);
        //llama la funcion si utilizas algun scrapeo como abajo
        $arrayproductos= [];
        $PcMig = $this->getProductosPcMig($pcMigProductos);
        foreach($PcMig as $indice => $producto){
            if($indice<5){
                array_push($arrayproductos, $producto);
            }else{
                break;
            }
        }


        $amazon = $this->getProductosAmazon($amazonProductos);
        foreach($amazon as $indice => $producto){
            if($indice<5){
                array_push($arrayproductos, $producto);
            }else{
                break;
            }
        }


        $cyberpuerta = $this->getProductosCyberpuerta(1,$cyberpuertaProductos);
        foreach($cyberpuerta as $indice => $producto){
            if($indice<5){
                array_push($arrayproductos, $producto);
            }else{
                break;
            }
        }

        
        self::$ListProduCyberPuertav2 =$cyberpuerta;
        $mercadolibre = $this->getProductosMercLibre($mercLibreProductos);
        foreach($mercadolibre as $indice => $producto){
            if($indice<5){
                array_push($arrayproductos, $producto);
            }else{
                break;
            }
        }


        $ddtech =  $this->getProductosDdTech($ddTechProductos);
        foreach($ddtech as $indice => $producto){
            if($indice<5){
                array_push($arrayproductos, $producto);
            }else{
                break;
            }
        }


        $pcCel = $this->getProductosPcel($pcCelProductos);
        foreach($pcCel as $indice => $producto){
            if($indice<5){
                array_push($arrayproductos, $producto);
            }else{
                break;
            }
        }





        $todo = array_merge($PcMig,$amazon,$cyberpuerta,$mercadolibre,$ddtech,$pcCel); // UNO LOS 6 ARRAYS
        
            $contador = 5;
        // $xcosa = "Cadena de texto"; Parametro de prueba
        //control de session //cambio de plantilla
        if(Auth::check()){//si el usuario esta logeado usara tal plantilla
            $plantilla='usuario';
        }else{
            $plantilla='defecto';
        }

        return   /* $request->all() */ view('search.index', compact('PcMig','amazon','cyberpuerta','mercadolibre','ddtech','pcCel','todo','contador','arrayproductos'), compact('plantilla'));
       
        
        // return   /* $request->all() */ view('search.index')->with('xcosa',$xcosa); Se manda la vista

    }

    public function getProductosAmazon($productos){
         $ListProductos = [];
        foreach ($productos->find('div[class="sg-col-4-of-12 s-result-item s-asin sg-col-4-of-16 sg-col s-widget-spacing-small sg-col-4-of-20"]') as $element) {
            try{
                $nombre=$element->find('a[class="a-link-normal a-text-normal"]',0)->plaintext;
            $linkCompra=$element->find('a[class="a-link-normal a-text-normal"]',0)->attr['href'];
            $precio=$element->find('div[class="a-section a-spacing-none"]',0)->plaintext;
            $linkImagen=$element->find('div[class="a-section aok-relative s-image-square-aspect"]',0)->find('img',0)->attr['src'];
            $linkCompra= "https://www.amazon.com.mx".$linkCompra;
            $preciopar=explode("$",$precio);
            $precio=$preciopar[1];
            $ProductoObte=new ProductoClass($nombre,$precio,$linkImagen,$linkCompra);
            array_push($ListProductos,$ProductoObte);
        }
        catch(Exception $e){
            continue;
        }
        }
        return $ListProductos;
    }

    public function getProductosMercLibre($productos){
        $ListProductos = [];
        foreach ($productos->find('li[class="ui-search-layout__item"]') as $element) {
            $caracteristicas = $element->find('div[class="ui-search-result__content-wrapper"]',0);
            $nombre=$caracteristicas->find('div[class="ui-search-item__group ui-search-item__group--title"]',0)->plaintext;
            $linkCompra=$caracteristicas->find('div[class="ui-search-item__group ui-search-item__group--title"]',0)->find('a',0)->attr['href'];
            $precio=$element->find('div[class="ui-search-item__group ui-search-item__group--price"]',0)->plaintext;
            $linkImagen=$element->find('div[class="slick-slide slick-active"]',0)->find('img',0)->attr['data-src'];
            $preciopar=explode(" ",$precio);
            $precio=$preciopar[0];
            $ProductoObte=new ProductoClass($nombre,$precio,$linkImagen,$linkCompra);
            array_push($ListProductos,$ProductoObte);
        }
        return $ListProductos;
    }


    public function getProductosDdTech($productos){
        $ListProductos = [];
        foreach ($productos->find('div[class="product"]') as $element) {
            $caracteristicas =$element->find('div[class="product-info text-left"]',0);
            $nombreProducto = $caracteristicas->find('a',0)->plaintext;
            $precioProducto = $caracteristicas->find('div[class="product-price"]',0)->find('span',0)->plaintext;
            $linkCompra=$caracteristicas->find('h3',0)->find('a',0)->attr['href'];
            /*$linkImagen=$element->find('div[class="image"]',0)->find('a',0)->find('img',0)->src;*/
            $linkImagen = 'img/box.png';
            $ProductoObte=new ProductoClass($nombreProducto,$precioProducto,$linkImagen,$linkCompra);
            array_push($ListProductos,$ProductoObte);
        }
        
        return $ListProductos;
    }



    public function getProductosPcMig($productos)
    {
        $ListProductos = [];
        foreach ($productos->find('div[class="product-wrapper"]') as $element) {
            $nombre = $element->find('h2[class="product-name"]',0)->plaintext;
            $precio = $element->find('div[class="price-box"]',0)->plaintext;
            /*$linkImagen = $element->find('div[class="product-image"]',0)->find('img',0)->src;*/
            $linkImagen = 'img/box.png';
            $linkCompra = $element->find('h2[class="product-name]',0)->find('a',0)->href;
            $ProductoObte=new ProductoClass($nombre,$precio,$linkImagen,$linkCompra);
            array_push($ListProductos,$ProductoObte);
        }
        return $ListProductos;
    }

    public function getProductosCyberpuerta($identificador,$productos)
    {
        $ListProductos = [];
        foreach ($productos->find('li[class="cell productData small-12 small-order-'.strval($identificador).'"]') as $element) {
            /* echo $element->plaintext;
            echo "<hr>"; */
            $nombre=$element->find('div[class="emproduct_right"]',0)->find('a',0)->plaintext;
            $linkImg=$element->find('div[class="catSlider"]',0)->attr['data-cp-prod-slider'];
            $price=$element->find('label[class="price"]',0)->plaintext;
            $linkCompra=$element->find('div[class="emproduct_left"]',0)->find('a',0)->attr['href'];

            $linkCompra=$element->find('[class="emproduct_left"]',0)->find('a',0)->attr['href'];
            $linkCyberpuerta="https://www.cyberpuerta.mx/img/product/S/";
            $LinkpartsImg=explode("https",$linkImg);
            $linkImgCom=$LinkpartsImg[1];
            $linkImgCom=explode("/S",$linkImgCom);
            $linkImgCom=trim($linkImgCom[1],"\/");
            $linkImgCom=trim($linkImgCom,'","]');
            $linkImgCom=$linkCyberpuerta.$linkImgCom;
            $linkImgCom = str_replace('&quot;,&quot;', '', $linkImgCom);
            $linkImgCom = str_replace('&quot;', '', $linkImgCom);
            $linkImgCom = str_replace(',', '', $linkImgCom);

            $ProductoObte=new ProductoClass($nombre,$price,$linkImgCom,$linkCompra);
            array_push($ListProductos,$ProductoObte);
        }
        return $ListProductos;
         
    
}


public function getProductosPcel($productos2)
{
    $ListProductos = [];
    foreach ($productos2->find('div[class="product-list"]',0)->find('table',0)->find('tr') as $indice => $producto) {
        if(($indice+1) % 2!=0){
            $nombreLinkProducto =$producto->find('div[class="name"]',0)->find('a',0);
            $LinkImagen =$producto->find('div[class="image"]',0)->find('a',0)->find('img',0)->src; 
            $precioProducto =$producto->find('div[class="price"]',0)->plaintext;
            $nombreProducto=$nombreLinkProducto->plaintext;
            $linkProducto=$nombreLinkProducto->attr['href'];  
            if(str_contains($precioProducto, ' ')){
                $preciopar=explode(" ",$precioProducto);
                $precioProducto=$preciopar[1];
            }
        }else{
            continue;
        }
        $ProductoObte=new ProductoClass($nombreProducto,$precioProducto,$LinkImagen,$linkProducto);
        array_push($ListProductos,$ProductoObte);
    }
    return $ListProductos;

}

}
