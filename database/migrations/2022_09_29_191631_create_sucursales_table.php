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
    public function up(){

        Schema::create('sucursales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');            
            $table->bigInteger('comuna_id')->unsigned();
            $table->string('nombre_sucursal', 50);
            $table->string('box',5);
            $table->string('telefono', 12);
            $table->string('direccion', 50);
            $table->string('correo', 50);
            $table->timestamps();
            // $table->foreign("comuna_id")->references("id")->on("comunas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
};
