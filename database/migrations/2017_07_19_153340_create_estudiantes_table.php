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
            $table->string('registro',8)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);            
            $table->char('sexo',1);
            $table->date('fechanac');
            $table->string('email');
            $table->string('domicilio');
            $table->smallinteger('idcarrera');
            $table->date('fechaegresado');
            $table->smallinteger('ppg');  
            //llaves foraneas
            $table->foreign('idcarrera')
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
