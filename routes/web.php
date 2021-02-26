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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('categorias', 'CategoriaController');
Route::resource('registroParaderos', 'RegistroParaderoController');
Route::resource('conductors', 'ConductorController');
Route::resource('inscripcions', 'InscripcionController');
Route::resource('propietarios', 'PropietarioController');
Route::resource('vehiculos', 'VehiculoController');

Route::group(['middleware' => ['role:Administrador']], function () {
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('fichaConductors', 'FichaConductorController');
    Route::resource('personals', 'PersonalController');
    Route::resource('contratoPersonals', 'ContratoPersonalController');
});