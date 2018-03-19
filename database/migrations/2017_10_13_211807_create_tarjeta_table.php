<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',40);
            $table->date('fecha_registro');
            $table->smallInteger('estado')->default('0');
            $table->string('comentario')->default('0');
            $table->integer('comensal_id')->unsigned();
            $table->foreign('comensal_id')->references('id')->on('comensal');
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
        Schema::drop('tarjeta');
    }
}
