<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DATOS_HORARIO_IMPORTADOS', function (Blueprint $table) {
            $table->id(); // Campo ID auto-incrementable
            $table->string('SECUENCIAL', 50);
            $table->string('GRUPO_NIVEL', 50)->nullable();
            $table->string('PROFESOR', 50)->nullable();
            $table->string('ASIGNATURA', 50)->nullable();
            $table->string('AULA', 50)->nullable();
            $table->date('DIA')->nullable();
            $table->time('HORA')->nullable();
            $table->string('NIVEL', 50)->nullable();
            $table->string('GRUPO', 50)->nullable();
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
        Schema::dropIfExists('DATOS_HORARIO_IMPORTADOS');
    }
};

