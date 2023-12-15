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
        Schema::create('publicacion_empleados', function (Blueprint $table) {
            $table->id();
            $table->date('fechaAsignacion');
            $table->unsignedBigInteger('idEmpleado');
            $table->unsignedBigInteger('idPublicacion');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idEmpleado')->references('id')->on('empleados');
            $table->foreign('idPublicacion')->references('id')->on('publicaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion_empleados');
    }
};
