<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("dni", 8)->unique();
            $table->string("paterno", 125);
            $table->string("materno", 125);
            $table->string("nombre", 125);
            $table->enum("sexo", ['Masculino', 'Femenino'] );
            $table->decimal('sueldo', 8, 2);
            $table->bigInteger("cargo_id")->unsigned();
            $table->bigInteger("area_id")->unsigned();
            $table->bigInteger("created_by");
            $table->bigInteger("updated_by");
        });

        Schema::table('trabajadores', function($table) {
           $table->foreign('cargo_id')
                    ->references('id')->on('cargos');

            $table->foreign('area_id')
                    ->references('id')->on('areas');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('trabajadores');
        
        // Schema::enableForeignKeyConstraints();
    }
}
