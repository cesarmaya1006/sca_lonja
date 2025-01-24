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
        Schema::create('user_tipoinmuebles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_user_tipoinmuebles')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_inmueble_id')->nullable();
            $table->foreign('tipo_inmueble_id', 'fk_tipo_inmueble_user')->references('id')->on('tipo_inmuebles')->onDelete('restrict')->onUpdate('restrict');
            $table->unique(['user_id','tipo_inmueble_id'],'cmr_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tipoinmuebles');
    }
};
