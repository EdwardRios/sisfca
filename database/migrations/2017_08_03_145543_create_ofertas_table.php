<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->smallInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->smallInteger('gestion_id');
            $table->foreign('gestion_id')->references('id')->on('gestiones');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unique(['materia_id','gestion_id']);
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
        Schema::dropIfExists('ofertas');
    }
}
