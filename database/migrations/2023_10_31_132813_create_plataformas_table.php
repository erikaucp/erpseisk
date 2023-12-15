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
        Schema::create('plataformas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('url', 100);
            $table->string('descripcion', 200);
            $table->unsignedBigInteger('idCliente');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->foreign('idEstado')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plataformas');
    }
};
