<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use App\MyClasses\ProductoClass;

class searchController extends Controller
{
    public static $ListaProductos = [];
    function index(Request $request, Client $client)
    {
        $search = $request->input('busqueda');
        $search = str_replace(' ', '+', $search);
        return   /* $request->all() */ view('search.index');
    }




    public function getProductosMercLibre($productos){
        $productos->filter('[class="ui-search-main ui-search-main--only-products"]')->first()->children('section')->children('ol')->first()->filter('li.ui-search-layout__item')->each(function($node){
           $caracteristicas = $node->children('div')->filter('[class="ui-search-result__wrapper"]')->first()->filter('[class="andes-card andes-card--flat andes-card--default ui-search-result ui-search-result--core andes-card--padding-default"]')->first();
            $nombre = $caracteristicas->filter('[class="ui-search-result__content-wrapper"]')->filter('div.ui-search-item__group ui-search-item__group--title');//->first()->filter('a');//->first()->children('div')->first()->children('a')->text();
            echo $nombre->html()."<br>";
            echo "<hr>";
        });
    }


    public function getProductosDdTech($productos){
        $productos->filter('[class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"]')->children()->filter('[class="product"]')->each(function ($node) {
            $caracteristicas =$node->children()->filter('[class="product-info text-left"]')->first();
            $nombreProducto = $caracteristicas->children('h3')->children('a')->first()->text();
            $precioProducto = $caracteristicas->children('div')->filter('[class="product-price"]')->first()->children('span')->first()->text();
            $linkCompra=$caracteristicas->children('h3')->children('a')->first()->attr('href');
            $linkImagen=$node->children('div')->filter('[class="image"]');
            echo $nombreProducto."<br>";
            echo $precioProducto."<br>";
            echo $linkImagen->html()."<br>";
            echo '<a href="'.$linkCompra.'">Link</a>'."<br>";
            echo "<hr>";
        });
        
    }



    public function getProductosPcMig($productos)
    {
        $productos->filter('[class="shop-products products row grid-view fullwidth"]')->filter('[class="product-wrapper"]')->each(function ($nodeProducto) {
            $nombre=$nodeProducto->filter('[class="product-name"]')->first()->text();
            $linkImagen=$nodeProducto->filter('[class="product-image"]')->first()->filter('img')->first()->attr('src');
            $linkCompra=$nodeProducto->filter('[class="product-name"]')->first()->filter('a')->attr('href');
            $precio=$nodeProducto->filter('[class="price-box"]')->first()->text();
            echo '<a href="'.$linkCompra.'">Link</a>'."<br>";
            echo '<img src="'.$linkImagen.'">'."<br>";
            echo $nombre."<br>";
            echo $precio."<br>";
            echo '<hr>';
        });
    }

    public function getProductosCyberpuerta($identificador,$productos)
    {
        $productos->filter('[class="cell productData small-12 small-order-'.strval($identificador).'"]')->each(function ($ProducNode) {
            $nombre=$ProducNode->filter('[class="emproduct_right"]')->first();
            $nombre=$nombre->children()->filter('a')->first()->text();
            $linkImg=$ProducNode->filter('[class="catSlider"]')->first()->attr('data-cp-prod-slider');
            $price=$ProducNode->filter('[class="emproduct_right_price_left"]')->first()->filter('[class="price"]')->first()->text();
    
            $linkCompra=$ProducNode->filter('[class="emproduct_left"]')->first()->children()->filter('a')->first()->attr('href');
            $linkCyberpuerta="https://www.cyberpuerta.mx/img/product/S/";
            $LinkpartsImg=explode("https",$linkImg);
            $linkImgCom=$LinkpartsImg[1];
            $linkImgCom=explode("/S",$linkImgCom);
            $linkImgCom=trim($linkImgCom[1],"\/");
            $linkImgCom=trim($linkImgCom,'","]');
            $linkImgCom=$linkCyberpuerta.$linkImgCom;
    
            $ProductoObte=new ProductoClass($nombre,$price,$linkImgCom,$linkCompra);
            array_push(self::$ListaProductos,$ProductoObte);
            //return $ProductoObte;
            });
         
    
}


public function getProductosPcel($productos2)
{
    $productos2->filter('[class="product-list"]')->filter('table')->filter('tr')->each(function( $ProducNode, $i){
        if(($i+1) % 2!=0){
            $nombreLinkProducto =$ProducNode->filter('[class="name"]')->first()->children('a');
            $LinkImagen =$ProducNode->filter('[class="image"]')->first()->children('a')->children('img')->attr('src'); 
            $precioProducto =$ProducNode->filter('[class="price"]')->text();
            $nombreProducto=$nombreLinkProducto->text();
            $linkProducto=$nombreLinkProducto->attr('href');  
            if(str_contains($precioProducto, ' ')){
                $preciopar=explode(" ",$precioProducto);
                $precioProducto=$preciopar[1];
            }
            
            echo "<br>";
            echo $precioProducto."<br>";
            echo '<a href='.$linkProducto.'>'.$nombreProducto.'</a>';
            echo '<img scr="'.$LinkImagen.'">';
            echo "<hr>";

            
        }
    });


   /*  foreach($productos2 as $index => $producto){
        echo $index;
        Crawler $producto1= $producto;
        if(!($index % 2)){
            $nombreProducto=$producto->filter('[class="name"]')->first()->children('a')->text();
            echo ($nombreProducto);
        }else{
            continue;
        }
    }   */ 
    

}

}
