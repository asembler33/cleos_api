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
        Schema::create('agendamiento', function (Blueprint $table) {
            $table->id();
            $table->integer('id_servicio');
            $table->integer('id_sucursal');
            $table->integer('id_especialidad');
            $table->integer('id_user');
            $table->integer('id_box');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->text('comentario');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamiento');
    }
};
