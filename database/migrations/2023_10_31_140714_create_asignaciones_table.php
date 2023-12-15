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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fechaAsignacion');
            $table->unsignedBigInteger('idCliente');
            $table->unsignedBigInteger('idEmpleado');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->foreign('idEmpleado')->references('id')->on('empleados');
            $table->foreign('idEstado')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
