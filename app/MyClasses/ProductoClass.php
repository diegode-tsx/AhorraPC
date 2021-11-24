<?php namespace App\MyClasses;

class ProductoClass
{
    public $nombre;
    public $precio;
    public $imagenLink;
    public $LinkCompra;


    public function __construct( $nombre, $precio, $imagenLink, $LinkCompra)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagenLink = $imagenLink;
        $this->LinkCompra = $LinkCompra;
    }
   
}