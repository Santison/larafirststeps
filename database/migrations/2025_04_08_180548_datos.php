<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {


        Schema::create('LOV', function (Blueprint $table) {
            $table->id(); // Campo ID auto-incrementable
            $table->string('DESCRIPCION');
            $table->string('TIPO');
            $table->string('ESTADO');            $table->timestamps();
        });

        Schema::create('PROFESOR', function (Blueprint $table) {
            $table->id('CODPROFESOR'); // Clave primaria con nombre personalizado
            $table->string('NOMBRE', 50)->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('ASIGNATURA', function (Blueprint $table) {
            $table->id('CODASIG');
            $table->string('NOMBRE', 50)->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('AULA', function (Blueprint $table) {
            $table->id('CODAULA');
            $table->string('NOMBRE', 50)->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('NIVEL', function (Blueprint $table) {
            $table->id('CODNIVEL');
            $table->string('NOMBRE', 50)->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('GRUPO', function (Blueprint $table) {
            $table->id('CODGRUPO');
            $table->string('NOMBRE', 50)->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('FALTAS', function (Blueprint $table) {
            $table->id('SEC_FALTAS');
            $table->unsignedBigInteger('CODPROFESOR');
            $table->date('DIA_INICIO');
            $table->date('DIA_FIN');
            $table->unsignedBigInteger('MOTIVO')->nullable();
        
            $table->timestamps();
        
            // Relaciones
            $table->foreign('CODPROFESOR')->references('CODPROFESOR')->on('PROFESOR')->onDelete('cascade');
            $table->foreign('MOTIVO')->references('id')->on('lov')->onDelete('set null');
        });
        
        Schema::create('FALTAS_HORA', function (Blueprint $table) {
            $table->unsignedBigInteger('SEC_FALTAS');
            $table->time('HORA')->nullable(false);
            $table->string('OBSERVACIONES');
            $table->string('DOCUMENTO')->nullable();
            $table->string('ESTADO')->nullable();
            $table->timestamps();
        
            $table->primary(['SEC_FALTAS', 'HORA']);
            $table->foreign('SEC_FALTAS')->references('SEC_FALTAS')->on('FALTAS')->onDelete('cascade');
        });
        
        Schema::create('HORARIO', function (Blueprint $table) {
            $table->id('SEC_HORARIO');
            $table->unsignedBigInteger('CODPROFESOR');
            $table->unsignedBigInteger('CODASIG');
            $table->unsignedBigInteger('CODAULA');
            $table->unsignedBigInteger('CODNIVEL');
            $table->unsignedBigInteger('CODGRUPO');
            $table->date('DIA')->nullable(false);
            $table->time('HORA')->nullable();
            $table->timestamps();
        
            // Relaciones
            $table->foreign('CODPROFESOR')->references('CODPROFESOR')->on('PROFESOR')->onDelete('cascade');
            $table->foreign('CODASIG')->references('CODASIG')->on('ASIGNATURA')->onDelete('cascade');
            $table->foreign('CODAULA')->references('CODAULA')->on('AULA')->onDelete('cascade');
            $table->foreign('CODNIVEL')->references('CODNIVEL')->on('NIVEL')->onDelete('cascade');
            $table->foreign('CODGRUPO')->references('CODGRUPO')->on('GRUPO')->onDelete('cascade');
        });
    }
    /**
     * Run the migrations.
     */        


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario');
        Schema::dropIfExists('faltas_hora');
        Schema::dropIfExists('faltas');
        Schema::dropIfExists('grupo');
        Schema::dropIfExists('nivel');
        Schema::dropIfExists('aula');
        Schema::dropIfExists('asignatura');
        Schema::dropIfExists('profesor');
        Schema::dropIfExists('lov');
    }
    
};
