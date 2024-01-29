<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_profesion');
            $table->string('rut');
            $table->string('nombres');
            $table->string('apellido_materno');
            $table->string('apellido_paterno');
            $table->string('direccion');
            $table->string('correo');
            $table->boolean('prestador_servicio');
            $table->text('imagen_trabajador');
            $table->text('imagen_firma')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
