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
        Schema::create('parrillas', function (Blueprint $table) {
            $table->id();
            $table->enum('mes', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11']);
            $table->enum('quincenaPublicacion', ['1', '2']);
            $table->text('observaciones')->nullable();
            $table->date('fechaCreacion');
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
        Schema::dropIfExists('parrillas');
    }
};
