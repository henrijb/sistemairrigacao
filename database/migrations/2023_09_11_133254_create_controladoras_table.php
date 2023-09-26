<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControladorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controladoras', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('status');
            $table->integer('numero_portas_analogicas');
            $table->integer('numero_portas_digitais');
            $table->string('ip');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controladoras');
    }
}
