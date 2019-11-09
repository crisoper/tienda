<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni', 8)->unique();
            $table->string('paterno', 125);
            $table->string('materno', 125);
            $table->string('nombre', 125);
            $table->enum('sexo', ['M', 'F']);
            $table->string('celular', 15)->nullable();
            $table->string('correo', 75)->nullable();
            $table->string('direccion', 75)->nullable();
            $table->date('fechanacimiento')->nullable();
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
        Schema::dropIfExists('personas');
    }
}
