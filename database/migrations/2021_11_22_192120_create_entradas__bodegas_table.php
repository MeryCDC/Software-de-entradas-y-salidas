<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas__bodegas', function (Blueprint $table) {
            $table->engine="InnoDB"; //Permite el borrado en cascada

            $table->id();
            $table->string("tgp");  
            $table->double('peso', 8, 2);
            $table->double('largo', 3, 2);
            $table->double('ancho', 3, 2);
            $table->double('alto', 3, 2);
            $table->double('peso_volumetrico', 4, 2)->storedAs('(alto * ancho * largo) / 166')->nullable();
            $table->double('volumen', 3, 2)->storedAs('alto * ancho * largo')->nullable();
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
        Schema::dropIfExists('entradas__bodegas');
    }
}
