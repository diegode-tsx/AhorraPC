<?php

namespace App\Http\Controllers;

//use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use App\MyClasses\ProductoClass;
use Goutte\Client;

class searchController extends Controller
{
    public static $ListProduCyberPuerta = [];//Lista de productos de la categoria CyberPuerta
    public static $ListProduDdTech = [];
    public static $ListProduPcMig = [];
    public static $ListProduPcel = [];
    function index(Request $request, Client $client)
    {
        $search = $request->input('busqueda');
        $search = str_replace(' ', '+', $search);

        $identificador = 1;
        $classDiv = 'searchList';
        $cyberpuertaProductos = $client->request('GET', 'https://www.cyberpuerta.mx/index.php?cl=search&searchparam=ryzen+3600');
        $pcCelProductos=$client->request('GET', 'https://pcel.com/index.php?route=product/search&filter_name=ryzen%205600');
        //$digitaLifeProductos=$client->request('GET', 'https://www.digitalife.com.mx/buscar/t_ryzen-3600');
        $pcMigProductos=$client->request('GET', 'https://pcmig.com.mx/?s=ryzen+3600&post_type=product');
        $ddTechProductos=$client->request('GET', 'https://ddtech.mx/buscar/ryzen+5+3600');
        //$mercLibreProductos=$client->request('GET','https://listado.mercadolibre.com.mx/amd-ryzen-5-3600');
        //llama la funcion si utilizas algun scrapeo como abajo
        //$this->getProductosMercLibre($mercLibreProductos);

        
        $suma = self::$ListProduPcMig;

        // $xcosa = "Cadena de texto"; Parametro de prueba

        return   /* $request->all() */ view('search.index', compact('suma'));

        
        // return   /* $request->all() */ view('search.index')->with('xcosa',$xcosa); Se manda la vista

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

            $ProductoObte=new ProductoClass($nombreProducto,$precioProducto,$linkImagen,$linkCompra);
            array_push(self::$ListProduDdTech,$ProductoObte);
        });
        
    }



    public function getProductosPcMig($productos)
    {
        $productos->filter('[class="shop-products products row grid-view fullwidth"]')->filter('[class="product-wrapper"]')->each(function ($nodeProducto) {
            $nombre=$nodeProducto->filter('[class="product-name"]')->first()->text();
            $linkImagen=$nodeProducto->filter('[class="product-image"]')->first()->filter('img')->first()->attr('src');
            $linkCompra=$nodeProducto->filter('[class="product-name"]')->first()->filter('a')->attr('href');
            $precio=$nodeProducto->filter('[class="price-box"]')->first()->text();

            $ProductoObte=new ProductoClass($nombre,$precio,$linkImagen,$linkCompra);
            array_push(self::$ListProduPcMig,$ProductoObte);
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
            array_push(self::$ListProduCyberPuerta,$ProductoObte);
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

            $ProductoObte=new ProductoClass($nombreProducto,$precioProducto,$LinkImagen,$linkProducto);
            array_push(self::$$ListProduPcel,$ProductoObte);
        }
    });

}

}
