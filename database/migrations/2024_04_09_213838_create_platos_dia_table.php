<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosDiaTable extends Migration
{
    public function up()
    {
        Schema::create('platos_dia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::create('platos_dia_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plato_dia_id')->constrained()->onDelete('cascade');
            $table->morphs('platoable');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('platos_dia_detalle');
        Schema::dropIfExists('platos_dia');
    }
}
