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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id');
            $table->text('prod_nombre');
            $table->integer('prod_cantidad')->nullable();
            $table->float('prod_precio_compra',10,2)->nullable();
            $table->float('prod_precio_venta',10,2)->nullable();
            $table->enum('prod_estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->date('prod_fecha_reg');
            $table->date('prod_fecha_vencimiento');
            $table->timestamps();
         
            $table->unsignedBigInteger('idcategoria')->index('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categorias');
         
            $table->unsignedBigInteger('idpresentacione')->index('idpresentacione');
            $table->foreign('idpresentacione')->references('id')->on('presentaciones');
            
            $table->unsignedBigInteger('idproveedore')->index('idproveedore');
            $table->foreign('idproveedore')->references('id')->on('proveedores');   

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
