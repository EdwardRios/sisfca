<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentemateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentematerias', function (Blueprint $table) {        
            $table->timestamps();
            $table->smallInteger('id_docente');
            $table->integer('id_gestion');
            $table->integer('id_materia');
            //fk
            $table->foreign('id_docente')
                  ->references('id')
                  ->on('docentes') ;
            $table->foreign('id_gestion')
                  ->references('id')
                  ->on('gestiones');
            $table->foreign('id_materia')
                  ->references('id')
                  ->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentematerias');
    }
}
