<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspender', function (Blueprint $table) {
           $table->increments('id');
           $table->string('motivo',100)->default('Faltas');
           $table->date('fecha_inicio');
           $table->date('fecha_conclucion');
           $table->integer('asignacion')->default(0);
           $table->integer('comensal_id')->unsigned();
           $table->integer('tarjeta_id')->unsigned();
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
        Schema::drop('suspender');
    }
}
