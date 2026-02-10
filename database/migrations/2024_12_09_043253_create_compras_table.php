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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id');
            $table->integer('co_cantidad')->nullable();
            $table->float('co_precio_total',10,2)->nullable();
            $table->dateTime('fecha_hora');
            $table->timestamps();
            $table->unsignedBigInteger('idcliente')->index('idcliente');
            $table->foreign('idcliente')->references('id')->on('clientes');
         
            $table->unsignedBigInteger('idproductos')->index('idproductos');
            $table->foreign('idproductos')->references('id')->on('productos');
                     
            $table->unsignedBigInteger('idcategoria')->index('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categorias');
         
            $table->unsignedBigInteger('idpresentacione')->index('idpresentacione');
            $table->foreign('idpresentacione')->references('id')->on('presentaciones');
            
            $table->unsignedBigInteger('idproveedore')->index('idproveedore');
            $table->foreign('idproveedore')->references('id')->on('proveedores');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
