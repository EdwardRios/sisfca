<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('nro_deposito');
            $table->date('fecha_deposito');
            $table->decimal('monto',8,2);
            $table->string('glosa');
            $table->integer('id_cuenta');
            //Add fk
            $table->foreign('id_cuenta')
                  ->references('id')
                  ->on('cuentas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
