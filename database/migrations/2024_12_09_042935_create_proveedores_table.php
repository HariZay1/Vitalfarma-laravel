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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id');
            $table->string('pro_nombre', 100); 
            $table->string('pro_email', 150)->unique(); 
            $table->string('pro_telefono', 15); 
            $table->string('pro_direccion', 255)->nullable(); 
            $table->enum('pro_estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->timestamps();
            $table->unsignedBigInteger('laboratorios_id')->index('laboratorios_id');
            $table->foreign('laboratorios_id')->references('id')->on('laboratorios');
        
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
