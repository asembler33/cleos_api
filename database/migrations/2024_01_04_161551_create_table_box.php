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

        Schema::create('box', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_box');
            $table->string('numero_box');
            $table->string('piso');
            $table->string('contacto');
            $table->string('detalle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        
        Schema::dropIfExists('box');
    }
};
