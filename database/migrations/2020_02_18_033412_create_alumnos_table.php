<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
           // $table->bigIncrements('id');
            $table->bigInteger('id')->unsigned()->unique();
            $table->bigInteger('cedula')->nullable(false);
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('curso');
            $table->char('turno');
            $table->timestamps();
            $table->unique('cedula');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
