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
        Schema::create('notificacion_empleado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idNotificacion');
            $table->unsignedBigInteger('idEmpleado');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idNotificacion')->references('id')->on('notificaciones');
            $table->foreign('idEmpleado')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacion_empleado');
    }
};
