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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['pendiente', 'publicado', 'en revision'])->default('pendiente');
            $table->date('fechaPublicacion');
            $table->text('linkContenido');
            $table->text('postCopyPublicacion');
            $table->text('copyDiseno');
            $table->text('linkReferencia');
            $table->text('linkDescargaRecursos');
            $table->text('observaciones');
            $table->unsignedBigInteger('idParilla');
            $table->unsignedBigInteger('idTipoContenido');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idParilla')->references('id')->on('parrillas');
            $table->foreign('idTipoContenido')->references('id')->on('tipos_contenido');
            $table->foreign('idEstado')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
