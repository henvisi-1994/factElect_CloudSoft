<?php

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
//Mostrar
Route::get('Categoria','AdminController@Categoria');
Route::get('Marca','AdminController@Marca');
Route::get('Unidad','AdminController@Unidad');
Route::get('Ciudad','AdminController@Ciudad');
Route::get('Proveedor','AdminController@Proveedor');
Route::get('Persona', 'AdminController@Persona');
Route::get('/admin', 'AdminController@inicio');
//Añadir
Route::get('addCategoria','AdminController@CargarCategoria');
Route::get('addMarca','AdminController@CargarMarca');
Route::get('addUnidad','AdminController@CargarUnidad');
Route::get('addCiudad','AdminController@CargarCiudad');
Route::get('addProveedor','AdminController@CargarProveedor');
Route::get('addPersona','AdminController@CargarPersona');
//Ruta Guardar
Route::post('storeCategoria','AdminController@guardarCategoria');
Route::post('storeMarca','AdminController@guardarMarca');
Route::post('storeUnidad','AdminController@guardarUnidad');
Route::post('storeCiudad','AdminController@guardarCiudad');
Route::post('storeProveedor','AdminController@guardarProveedor');
Route::post('storePersona','AdminController@guardarPersona');
//Ruta Modificar
Route::post('updateCategoria/{id}','AdminController@modificarCategoria');
Route::post('updateMarca/{id}','AdminController@modificarMarca');
Route::post('updateUnidad/{id}','AdminController@modificarUnidad');
Route::post('updateCiudad/{id}','AdminController@modificarCiudad');
Route::post('updateProveedor/{id}','AdminController@modificarProveedor');
Route::post('updatePersona/{id}','AdminController@modificarPersona');
//Ruta Pre-Modificar
Route::get('preupdateCategoria/{id}','AdminController@premodificarCategoria');
Route::get('preupdateMarca/{id}','AdminController@premodificarMarca');
Route::get('preupdateUnidad/{id}','AdminController@premodificarUnidad');
Route::get('preupdateCiudad/{id}','AdminController@premodificarCiudad');
Route::get('preupdateProveedor/{id}','AdminController@premodificarProveedor');
Route::get('preupdatePersona/{id}','AdminController@premodificarPersona');


