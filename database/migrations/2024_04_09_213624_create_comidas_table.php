<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComidasTable extends Migration
{
    public function up()
    {
        Schema::create('comidas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('grupo');
            $table->string('nombre_plato');
            $table->decimal('precio_defecto', 8, 2);
            $table->timestamps();
        });

        Schema::create('comida_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comida_id')->constrained()->onDelete('cascade');
            $table->string('ingrediente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comida_ingredientes');
        Schema::dropIfExists('comidas');
    }
}
