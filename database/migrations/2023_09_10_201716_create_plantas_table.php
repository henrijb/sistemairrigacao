<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('percentual_umidade');
            $table->dateTime('ultima_rega')->nullable();
            $table->date('data_plantacao');
            $table->string('status');
            $table->integer('porta_arduino_analogica');
            $table->integer('porta_arduino_digital');
            $table->integer('id_arduino');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas');
    }
}
