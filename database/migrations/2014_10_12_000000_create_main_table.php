<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 30);
            $table->string('module', 30);
            $table->string('description', 150);
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('second_last_name')->nulleable();
            $table->string('email');
            $table->string('password');
            $table->integer('role_id')->unsigned()->nulleable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('autors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('breve_desc');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->longText('semblanza');
            $table->string('imagen');
            $table->timestamps();
        });
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('subtitulo');
            $table->unsignedInteger('autor_id');
            $table->unsignedInteger('rol_id');
            $table->unsignedInteger('collection_id');
            $table->string('isbn');
            $table->string('tamaño');
            $table->float('precio');
            $table->longText('semblanza');
            $table->string('ebook');
            $table->string('url');
            $table->string('imagen');
            $table->timestamps();

            $table->foreign('autor_id')->references('id')->on('autors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('collection_id')->references('id')->on('collections')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('collections');
        Schema::dropIfExists('autors');
        Schema::dropIfExists('passwords');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('passwords_resets');
    }
}
