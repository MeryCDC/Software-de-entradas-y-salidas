<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasImportacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas__importacions', function (Blueprint $table) {
            $table->engine="InnoDB"; //Permite el borrado en cascada

            $table->id();
            $table->timestamps();
            $table->integer('user_id')->unsigned(); //FK

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
        Schema::dropIfExists('salidas__importacions');
    }
}
