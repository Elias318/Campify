<?php

use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FinalizarCompraController;
use App\Http\Controllers\MeGustasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FormularioController;

Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/sobreNosotros', function() {
    return view('sobreNosotros');
})->name('sobreNosotros');

Route::get('/trabajaConNosotros', function() {
    return view('trabajaConNosotros');
})->name('trabajaConNosotros');

Route::get('/inicioSesion', function() {
    return view('inicioSesion');
})->name('inicioSesion');

Route::get('/crearCuenta', function() {
    return view('crearCuenta');
})->name('crearCuenta');

Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.vistaProducto');

Route::post('/registro', [LoginController::class, 'registro'])->name('registro'); 
Route::post('/login', [LoginController::class, 'login'])->name('login'); 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/catalogo', [ProductoController::class,'store'])->name('catalogo.agregar');
Route::get('/catalogo/buscar', [ProductoController::class,'search'])->name('catalogo.busqueda');
Route::get('/catalogo', [ProductoController::class,'index'])->name('catalogo');

Route::get('/agregarproducto',[ProductoController::class, 'create'])->name('agregarproducto');

Route::get('/meGustas', [MeGustasController::class, 'index'])->name('meGustas');
Route::delete('/me-gusta/destroy', [MeGustasController::class, 'destroy'])->name('me-gusta.destroy');
Route::post('/me-gusta/toggle', [MeGustasController::class, 'toggle'])->name('me-gusta.toggle');

Route::post('/producto/{producto_id}', [ComentarioController::class,'store']);

Route::post('/enviar-formulario', [FormularioController::class, 'enviarFormulario'])->name('enviar.formulario');

Route::post('/carrito/agregar/{productoId}', [CarritoController::class, 'store'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::delete('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::patch('/carrito/disminuir', [CarritoController::class, 'disminuir'])->name('carrito.disminuir');


Route::get('/finalizarcompra', [FinalizarCompraController::class, 'finalizarCompra'])->name('finalizarcompra');
Route::post('/finalizarcompra/agradecimiento', [FinalizarCompraController::class, 'compraFinalizada'])->name('finalizarcompra.agradecimiento');
// Route::get('/agradecimiento', [FinalizarCompraController::class, 'mostrarAgradecimiento'])->name('agradecimiento');




