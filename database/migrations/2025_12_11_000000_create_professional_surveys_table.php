<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professional_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('cedula', 100);
            $table->string('direccion', 500);
            $table->string('numero_colegiatura');
            $table->string('lugar_consulta');
            $table->unsignedTinyInteger('edad');
            $table->string('email');
            $table->string('especialidad');
            $table->string('telefono', 50);
            $table->enum('genero', ['femenino', 'masculino']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professional_surveys');
    }
};
