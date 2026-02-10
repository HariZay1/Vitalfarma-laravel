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
            $table->id('id');
            $table->string('cli_ci',10)->nullable();
            $table->string('cli_expedido',10)->nullable();
            $table->string('cli_nombre',50)->nullable();
            $table->string('cli_paterno',50)->nullable();
            $table->string('cli_materno',50)->nullable();
            $table->integer('cli_celular')->nullable();
            $table->enum('cli_estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->date('cli_fecha_reg');
            $table->timestamps();
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
