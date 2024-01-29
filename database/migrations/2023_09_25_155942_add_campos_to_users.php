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
        Schema::table('users', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_rol')->after('id');
            $table->unsignedBigInteger('id_profesion')->after('id_rol');
            $table->string('rut', 15)->unique()->after('id_profesion');
            $table->string('nombres', 50)->after('id_profesion');
            $table->string('apellido_paterno', 50)->after('nombres');
            $table->string('apellido_materno', 50)->after('apellido_paterno');
            $table->string('direccion', 80); 
            $table->boolean('prestador_servicio')->after('direccion');
            $table->text('imagen_firma')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
