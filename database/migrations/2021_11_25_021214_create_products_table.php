<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nomProducto');
            $table->string('url_pagina');
            $table->string('url_imagen');
            $table->string('precio');
            $table->foreignId('idpagina')->constrained()->onUpdate('cascade');
            $table->foreign('idPagina')->references('idPagina')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
