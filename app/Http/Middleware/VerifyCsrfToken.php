<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'estadoPresentacion',
        'editarCliente',
        'eliminarCliente',
        'eliminarPresentacion',
        'estadoCategoria',
        'eliminarCategoria',
        'estadoLaboratorio',
        'eliminarLaboratorio',
        'eliminarProveedor',
        'editarProveedor',
        'estadoProveedor',
        'buscarProveedores',
        'eliminarProducto',
        'editarProducto',
        'estadoProducto',
        'buscarCarnet',
        'buscarProductos',

    
    
    ];
}
