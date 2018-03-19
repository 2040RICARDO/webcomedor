<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu',40);
            $table->date('fecha_asistencia');
            $table->integer('comensal_id')->unsigned();
            $table->integer('tarjeta_id')->unsigned();
            $table->integer('eventual_id')->unsigned();
            $table->foreign('comensal_id')->references('id')->on('comensal');
            $table->foreign('tarjeta_id')->references('id')->on('tarjeta');
            $table->foreign('eventual_id')->references('id')->on('eventual');
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
        Schema::drop('asistencia');
    }
}
