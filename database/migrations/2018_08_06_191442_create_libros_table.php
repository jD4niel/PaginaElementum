<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('datos');
            $table->float('precio');
            $table->unsignedInteger('autor_id');
            $table->unsignedInteger('editorial_id');
            $table->timestamps();

            $table->foreign('autor_id')->references('id')->on('autors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('editorial_id')->references('id')->on('editorials')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
