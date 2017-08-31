<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('gestiones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('grupo',4);
            $table->smallInteger('version');
            $table->smallInteger('edicion');
            $table->smallInteger('anho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestiones');
    }
}
