<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('eventual', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->integer('ci');
            $table->string('procedencia',30);
            $table->integer('numero');
            $table->string('genero',20);
            $table->string('imagen');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('carreras_id')->unsigned();
            $table->integer('suspender_id')->unsigned();
            $table->integer('comensal_id')->unsigned();
            $table->integer('tarjeta_id')->unsigned();
             $table->foreign('carreras_id')->references('id')->on('carreras');
            $table->foreign('suspender_id')->references('id')->on('suspender');
            $table->foreign('comensal_id')->references('id')->on('comensal');
            $table->foreign('tarjeta_id')->references('id')->on('tarjeta');
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
        Schema::drop('eventual');
    }
}
