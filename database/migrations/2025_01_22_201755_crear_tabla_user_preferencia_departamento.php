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
        Schema::create('user_preferencia_departamento', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_user_departamentos')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id', 'fk_departamento_user')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            $table->unique(['user_id','departamento_id'],'cmr_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preferencia_departamento');
    }
};
