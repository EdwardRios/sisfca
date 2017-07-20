<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('codigo')->unique();
            $table->string('ciciudad');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('grado', 12);
            $table->char('sexo',1);
            $table->date('fechanac');
            $table->date('fechaingreso');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
