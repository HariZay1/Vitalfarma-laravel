<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\presentacionController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\laboratorioController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\ventaController;
//index
Route::get('/',[homeController::class,'index'])->name('panel.index');

//registro y login 
Route::get('/login',[loginController::class,'index'])->name('login');
Route::post('/login',[loginController::class,'login']);
Route::get('/logout',[logoutController::class,'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store'); 


Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
Route::get('/listaCliente', [clienteController::class, 'listaCliente']);
Route::post('/nuevoRegistroCliente', [clienteController::class, 'nuevoRegistroCliente']);
Route::post('/editarCliente', [clienteController::class, 'editarCliente']);
Route::post('/editarRegistroCliente', [clienteController::class, 'editarRegistroCliente']);
Route::post('/eliminarCliente', [clienteController::class, 'eliminarCliente']);


Route::get('/tipoPresentacion', [presentacionController::class, 'tipoPresentacion']);
Route::post('/nuevoRegistroPresentacion', [presentacionController::class, 'nuevoRegistroPresentacion']);
Route::post('/estadoPresentacion', [presentacionController::class, 'estadoPresentacion']);
Route::post('/eliminarPresentacion', [presentacionController::class, 'eliminarPresentacion']);


Route::get('/tipoCategoria', [categoriaController::class, 'tipoCategoria']);
Route::post('/nuevoRegistroCategoria', [categoriaController::class, 'nuevoRegistroCategoria']);
Route::post('/estadoCategoria', [categoriaController::class, 'estadoCategoria']);
Route::post('/eliminarCategoria', [categoriaController::class, 'eliminarCategoria']);


Route::get('/tipoLaboratorio', [laboratorioController::class, 'tipoLaboratorio']);
Route::post('/nuevoRegistroLaboratorio', [laboratorioController::class, 'nuevoRegistroLaboratorio']);
Route::post('/estadoLaboratorio', [laboratorioController::class, 'estadoLaboratorio']);
Route::post('/eliminarLaboratorio', [laboratorioController::class, 'eliminarLaboratorio']);

Route::get('/listaProveedor', [proveedorController::class, 'listaProveedor']);
Route::post('/nuevoRegistroProveedor', [proveedorController::class, 'nuevoRegistroProveedor']);
Route::post('/editarProveedor', [proveedorController::class, 'editarProveedor']);
Route::post('/editarRegistroProveedor', [proveedorController::class, 'editarRegistroProveedor']);
Route::post('/eliminarProveedor', [proveedorController::class, 'eliminarProveedor']);
Route::post('/estadoProveedor', [proveedorController::class, 'estadoProveedor']);


Route::get('/listaProducto', [productoController::class, 'listaProducto']);
Route::post('/buscarProveedores', [productoController::class, 'buscarProveedores']);
Route::post('/nuevoRegistroProducto', [productoController::class, 'nuevoRegistroProducto']);
Route::post('/editarProducto', [productoController::class, 'editarProducto']);
Route::post('/editarRegistroProducto', [productoController::class, 'editarRegistroProducto']);
Route::post('/eliminarProducto', [productoController::class, 'eliminarProducto']);
Route::post('/estadoProducto', [productoController::class, 'estadoProducto']);


Route::get('/ventaProductos', [ventaController::class, 'ventaProductos']);
Route::post('/buscarCarnet', [ventaController::class, 'buscarCarnet']);
Route::post('/buscarProducto', [ventaController::class, 'buscarProducto']);
Route::post('/nuevoRegistroVenta', [ventaController::class, 'nuevoRegistroVenta']);


Route::get('/reporteExcel', [productoController::class, 'reporteExcel']);
Route::get('/rerportepdf', [productoController::class, 'rerportepdf']);
