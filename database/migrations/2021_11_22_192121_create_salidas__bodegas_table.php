<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas__bodegas', function (Blueprint $table) {
            $table->engine="InnoDB"; //Permite el borrado en cascada
            
            $table->id();

            $table->double('peso', 8, 2);
            $table->string("url_imagen");
            $table->string("guia_transportadora");
            $table->string("transportadora");
            $table->string("unidad");
            $table->timestamps();

            $table->string("id_cdc");
            $table->unsignedBigInteger('user_id');         
            
            $table->foreign('user_id')->references('id')->on('users'); //Constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas__bodegas');
    }
}
