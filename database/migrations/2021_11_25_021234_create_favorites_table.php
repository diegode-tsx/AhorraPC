<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id('idFav');
            $table->foreignId('idPage')->constrained()->onUpdate('cascade');
            $table->foreignId('idUser')->constrained()->onUpdate('cascade');
            $table->string('nomProducto');
            $table->string('url_page');
            $table->string('url_image');
            $table->string('price');

            
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idPage')->references('idPage')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
