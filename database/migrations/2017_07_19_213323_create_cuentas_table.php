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
            $table->integer('descuento')->default(0)->nullable();
            $table->integer('materias_reprobadas')->default(0);
            $table->decimal('monto_pagado',8,2)->default(0);
            $table->decimal('saldo',8,2)->nullable();
            $table->smallInteger('programa_id');
            $table->integer('estudiante_id');
            $table->unique('programa_id','estudiante_id');
            //fk
            $table->foreign('estudiante_id')
                  ->references('id')
                  ->on('estudiantes');
            $table->foreign('programa_id')
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
