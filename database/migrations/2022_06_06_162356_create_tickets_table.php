<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('espacio_id')->nullable();
            $table->unsignedBigInteger('nota_venta_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->dateTime('fecha')->default(Date('Y-m-d\TH:i',time()));
            $table->dateTime('fecha_lectura')->nullable();
            $table->double('precio')->nullable();
            $table->string('clave')->nullable();
            $table->string('cliente')->nullable();
            $table->string('evento')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('sector')->nullable();
            $table->string('espacio')->nullable();
            $table->string('tipo')->nullable();
            
            $table->foreign('ubicacion_id')->references('id')->on('ubicacions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('espacio_id')->references('id')->on('espacios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nota_venta_id')->references('id')->on('nota_ventas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
