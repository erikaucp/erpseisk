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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', 10);
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('email', 50);
            $table->string('observaciones', 200);
            $table->unsignedBigInteger('idTipoIdentificacion');
            $table->unsignedBigInteger('idRol');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idTipoIdentificacion')->references('id')->on('tipos_identificacion');
            $table->foreign('idRol')->references('id')->on('roles');
            $table->foreign('idEstado')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
