<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ocurrencia','OcurrenciaController');
Route::get('/confirmarOcurrencia/{id}/confirmar','OcurrenciaController@confirmar')->name('confirmarOcurrencia');
Route::get('/cancelarOcurrencia', function () {
    return redirect()->route('ocurrencia.index')->with('datos','Acción Cancelada');
})->name('cancelarOcurrencia');

Route::resource('pagobase','PagoBaseController');
Route::get('/confirmarPagoBase/{id}/confirmar','PagoBaseController@confirmar')->name('confirmarPagoBase');
Route::get('/cancelarPagoBase', function () {
    return redirect()->route('pagobase.index')->with('datos','Acción Cancelada');
})->name('cancelarPagoBase');

Route::resource('reclamo','ReclamoController');
Route::get('/confirmarReclamo/{id}/confirmar','ReclamoController@confirmar')->name('confirmarReclamo');
Route::get('/cancelarReclamo', function () {
    return redirect()->route('reclamo.index')->with('datos','Acción Cancelada');
})->name('cancelarReclamo');

Route::resource('serviciotaxi','ServicioTaxiController');
Route::get('/confirmarServicioTaxi/{id}/confirmar','ServicioTaxiController@confirmar')->name('confirmarServicioTaxi');
Route::get('/cancelarServicioTaxi', function () {
    return redirect()->route('serviciotaxi.index')->with('datos','Acción Cancelada');
})->name('cancelarServicioTaxi');

Route::resource('justificacionfalta','JustificacionFaltaController');
Route::get('/confirmarJustificacionFalta/{id}/confirmar','JustificacionFaltaController@confirmar')->name('confirmarJustificacionFalta');
Route::get('/cancelarJustificacionFalta', function () {
    return redirect()->route('justificacionfalta.index')->with('datos','Acción Cancelada');
})->name('cancelarJustificacionFalta');

Route::resource('documentoinscripcion','DocumentoInscripcionController');
Route::get('/confirmarDocumentoInscripcion/{id}/confirmar','DocumentoInscripcionController@confirmar')->name('confirmarDocumentoInscripcion');
Route::get('/cancelarDocumentoInscripcion', function () {
    return redirect()->route('documentoinscripcion.index')->with('datos','Acción Cancelada');
})->name('cancelarDocumentoInscripcion');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');












Route::resource('categorias', 'CategoriaController');

Route::resource('usuarios', 'UsuariosController');