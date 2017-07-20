<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->timestamps();
            $table->smallInteger('nota_materia');
            $table->integer('id_estudiante');
            $table->smallInteger('id_gestion');
            $table->integer('id_materia');
            
            //Add PK
            $table->primary(['id_estudiante','id_gestion','id_materia']);
            //Add FK                        
            $table->foreign('id_materia')
                  ->references('id')
                  ->on('materias');
            $table->foreign('id_estudiante')
                ->references('id')
                ->on('estudiantes');
            $table->foreign('id_gestion')
                  ->references('id')
                  ->on('gestiones');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
