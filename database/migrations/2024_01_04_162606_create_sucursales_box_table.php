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

        Schema::create('sucursales_box', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sucursal');
            $table->integer('id_box');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        
        Schema::dropIfExists('sucursales_box');
    }
};
