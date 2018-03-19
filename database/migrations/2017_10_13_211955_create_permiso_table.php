<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso', function (Blueprint $table) {
            $table->increments('id');
           $table->string('motivo',100);
           $table->date('fecha_inicio');
           $table->date('fecha_final');
           $table->integer('totaldias')->default(0);
           $table->date('fecha_modificacion');
           $table->string('observacion')->default('0');
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
        Schema::drop('permiso');
    }
}
