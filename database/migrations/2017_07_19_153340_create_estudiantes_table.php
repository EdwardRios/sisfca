<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('carnet')->unique();
            $table->string('ciciudad');
            $table->string('registro',8)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);            
            $table->char('sexo',1);
            $table->date('fechanac');
            $table->integer('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('fechaegresado');
            $table->smallinteger('ppg');  
            $table->smallinteger('carrera_id');
            //llaves foraneas
            $table->foreign('carrera_id')
                  ->references('id')->on('carreras');                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
