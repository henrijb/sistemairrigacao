<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControladoraPortasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controladora_portas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('controladora_id')->unsigned();
            $table->string('nome');
            $table->string('tipo');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('controladora_id')->references('id')->on('controladoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controladora_portas');
    }
}
