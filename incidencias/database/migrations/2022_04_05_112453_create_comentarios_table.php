<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('id_incidencia');
            $table->foreign('id_incidencia')->references('id')->on('incidencias')->onDelete('cascade');
            $table->unsignedinteger('autor');
            $table->foreign('autor')->references('id')->on('users')->onDelete('cascade');
            $table->char('titulo', 255);
            $table->char('descripcion', 255);
            $table->dateTime('fecha');
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
        Schema::dropIfExists('comentarios');
    }
}
