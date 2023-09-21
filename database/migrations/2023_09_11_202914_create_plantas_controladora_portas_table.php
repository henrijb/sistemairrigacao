<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasControladoraPortasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas_controladora_portas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('planta_id')->unsigned();
            $table->bigInteger('controladora_porta_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('planta_id')->references('id')->on('plantas');
            $table->foreign('controladora_porta_id')->references('id')->on('controladora_portas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas_controladora_portas');
    }
}
