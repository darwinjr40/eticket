<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_pagos', function (Blueprint $table) {
            $table->integer('id_tipoPago')->unsigned();
            $table->integer('id_notaVenta')->unsigned();
            $table->increments('id');
            $table->string('ci',15);
            $table->string('nombre',255);
            $table->string('nro',20);
            $table->string('expiracion')->nullable();
            $table->string('cvc',4)->nullable();
            $table->string('estado');
            $table->foreign('id_tipoPago')->references('id')->on('tipo_pagos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_notaVenta')->references('id')->on('nota_ventas')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_pagos');
    }
}
