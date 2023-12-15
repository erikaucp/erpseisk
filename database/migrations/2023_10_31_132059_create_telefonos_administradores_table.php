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
        Schema::create('telefonos_administradores', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 10);
            $table->unsignedBigInteger('idAdministrador');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idAdministrador')->references('id')->on('administradores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos_administradores');
    }
};
