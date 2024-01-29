<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("rut", 15);
            $table->string("nombres",50);
            $table->string("apellido_paterno", 30);
            $table->string("apellido_materno",30);
            $table->date("fecha_nacimiento");
            $table->string("telefono",15);
            $table->text("correo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
