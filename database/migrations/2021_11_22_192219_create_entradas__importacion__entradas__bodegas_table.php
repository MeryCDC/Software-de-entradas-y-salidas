<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasImportacionEntradasBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas__importacion__entradas__bodegas', function (Blueprint $table) {
            $table->engine="InnoDB"; //Permite el borrado en cascada
            
            $table->id();
            $table->timestamps();

            $table->integer('entradas__importacions_id')->unsigned(); //FK            
            $table->integer('entradas__bodegas_id')->unsigned(); //FK 
            
            $table->foreign('entradas__importacions_id')->references('id')->on('entradas__importacions'); //Constraint
            $table->foreign('entradas__bodegas_id')->references('id')->on('entradas__bodegas'); //Constraint
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas__importacion__entradas__bodegas');
    }
}
