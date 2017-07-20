<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('codigo', 7);
            $table->string('nombre');
            $table->smallInteger('nivel');
            $table->smallInteger('id_programa');
            //fk
            $table->foreign('id_programa')
                  ->references('id')
                  ->on('programas');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
