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
        Schema::create('empleados_habilidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEmpleado');
            $table->unsignedBigInteger('idHabilidad');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idEmpleado')->references('id')->on('empleados');
            $table->foreign('idHabilidad')->references('id')->on('habilidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados_habilidades');
    }
};
