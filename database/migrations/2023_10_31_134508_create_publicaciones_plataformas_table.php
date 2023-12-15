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
        Schema::create('publicaciones_plataformas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPublicacion');
            $table->unsignedBigInteger('idPlataforma');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idPublicacion')->references('id')->on('publicaciones');
            $table->foreign('idPlataforma')->references('id')->on('plataformas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones_plataformas');
    }
};
