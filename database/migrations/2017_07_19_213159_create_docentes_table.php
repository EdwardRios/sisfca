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
            $table->integer('codigo')->unique();
            $table->string('carnet')->unique();
            $table->string('ciciudad');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fechanac');
            $table->char('sexo',1);
            $table->string('grado', 12);
            $table->integer('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('domicilio')->nullable();
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
