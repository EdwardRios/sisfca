<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->decimal('monto_programa',8,2);
            $table->integer('descuento');
            $table->integer('materias_reprobadas');
            $table->decimal('monto_pagado',8,2);
            $table->decimal('saldo',8,2);
            $table->smallInteger('id_programa');
            $table->integer('id_estudiante');        
            //fk
            $table->foreign('id_estudiante')
                  ->references('id')
                  ->on('estudiantes');
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
        Schema::dropIfExists('cuentas');
    }
}
