<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->char('titulo', 255);
            $table->char('descripcion', 255);
            $table->unsignedInteger('aula');
            $table->foreign('aula')->references('id')->on('aulas')->onDelete('cascade');
            $table->date('fecha_cierre')->nullable();
            $table->unsignedinteger('estado');
            $table->foreign('estado')->references('id')->on('estados')->onDelete('cascade');
            $table->unsignedinteger('creador');
            $table->foreign('creador')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('incidencias');
    }
}
