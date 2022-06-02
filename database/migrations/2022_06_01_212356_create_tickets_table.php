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
            $table->dateTime('fecha')->default(Date('Y-m-d\TH:i',time()));
            $table->double('precio')->default(0);
            $table->string('clave')->default('');
            $table->string('cliente')->default('');
            $table->string('evento')->default('');
            $table->string('ubicacion')->default('');
            $table->string('espacio')->default('');
            $table->string('tipo')->default('');
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
