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
            $table->id();

            //Ejemplo de declaracion de llaves foraneas dentro de la migración
            $table->unsignedBigInteger('minutas_id'); //Declaras el campo, el campp debe ser MombreTabla_id
            $table->foreign('minutas_id')->references('id')->on('minutas'); //referencia a la tabla

            $table->timestamps();
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
