<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',255);
            $table->string('descripcion',255);
            $table->integer('capacidad');
            $table->unsignedTinyInteger('estado')->default(0);
            $table->integer('precio');
            $table->integer('id_sector')->unsigned();
            $table->foreign('id_sector')->references('id')->on('sectors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacios');
    }
}
