@extends('layouts.plantilla-'.$plantilla)

@php //borra el cache para que no entren dandole atras si no estan logueados
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp

@section('title','Configuración')
    
@section('content')
    <!---Cuerpo aqui puedes hacer la plantilla --->
    <h1>Esta es la pagina de configuración</h1>
    
    
@endsection

