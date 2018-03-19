<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComensalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comensal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->integer('ci');
            $table->string('procedencia',30);
            $table->integer('numero');
            $table->string('genero',20);
            $table->string('imagen');
            $table->integer('designacion');
            $table->integer('carreras_id')->unsigned();
            $table->foreign('carreras_id')->references('id')->on('carreras');
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
        Schema::drop('comensal');
    }
}
