<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('oferta_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->integer('nota')->unsigned()->default(0);
            $table->foreign('oferta_id')
                ->references('id')
                ->on('ofertas');
            $table->foreign('estudiante_id')
                ->references('id')
                ->on('estudiantes');
            $table->unique(['oferta_id', 'estudiante_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
