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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', 11)->unique();
            $table->string('empresa', 80);
            $table->string('direccion', 50);
            $table->enum('tipo', ['GR', 'MD', 'PQ']);
            $table->text('observaciones');
            $table->unsignedBigInteger('idAdministrador');
            $table->unsignedBigInteger('idTipoIdentificacion');
            $table->unsignedBigInteger('idEstado');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('idAdministrador')->references('id')->on('administradores');
            $table->foreign('idTipoIdentificacion')->references('id')->on('tipos_identificacion');
            $table->foreign('idEstado')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
