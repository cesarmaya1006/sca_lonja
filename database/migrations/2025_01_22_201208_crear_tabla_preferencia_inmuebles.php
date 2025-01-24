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
        Schema::create('preferencia_inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->foreign('id', 'fk_preferencias_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ubicacion')->default('AMBOS')->nullable();
            $table->string('avaluo_corporativo')->default('NO')->nullable();
            $table->bigInteger('precio_min')->default(0)->nullable();
            $table->bigInteger('precio_max')->default(0)->nullable();
            $table->bigInteger('area_minima')->default(0)->nullable();
            $table->bigInteger('area_maxima')->default(0)->nullable();
            $table->string('tipo_area')->default('Metros Cuadrados')->nullable();
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferencia_inmuebles');
    }
};
