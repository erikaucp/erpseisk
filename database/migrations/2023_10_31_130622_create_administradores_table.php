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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', 11)->unique();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('email', 50);
            $table->unsignedBigInteger('idTipoIdentificacion');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
