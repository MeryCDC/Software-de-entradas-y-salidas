<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasImportacionSalidasBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas__importacion__salidas__bodegas', function (Blueprint $table) {
            $table->engine="InnoDB"; //Permite el borrado en cascada
            $table->id();
            $table->timestamps();

            $table->integer('salidas__importacions_id')->unsigned(); //FK            
            $table->integer('salidas__bodegas_id')->unsigned(); //FK 
            
            $table->foreign('salidas__importacions_id')->references('id')->on('salidas__importacions'); //Constraint
            $table->foreign('salidas__bodegas_id')->references('id')->on('salidas__bodegas'); //Constraint

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas__importacion__salidas__bodegas');
    }
}
