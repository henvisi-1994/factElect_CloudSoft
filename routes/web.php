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
Route::get('Ciudad','AdminController@Ciudad');
Route::get('Persona', 'AdminController@Persona');
Route::get('/admin', 'AdminController@inicio');
Route::get('Compras','AdminController@Compras');
Route::get('TipoContribuyente','AdminController@TipoContribuyente');
Route::get('Identificaciones','AdminController@Identificaciones');
//Obtener
Route::get('getProveedor','AdminController@getProveedor');
Route::get('getProducto','AdminController@getProducto');
Route::get('getCategorias','AdminController@getCategoria');
Route::get('getUnidad','AdminController@getUnidad');
Route::get('getMarca','AdminController@getMarca');
//Añadir
Route::get('addPersona','AdminController@CargarPersona');
Route::get('addProveedor','AdminController@CargarPersona');
//Ruta Guardar
Route::post('storeCategoria','AdminController@guardarCategoria');
Route::post('storeMarca','AdminController@guardarMarca');
Route::post('storeUnidad','AdminController@guardarUnidad');
Route::post('storeCiudad','AdminController@guardarCiudad');
Route::post('storeProveedor','AdminController@guardarProveedor');
Route::post('storePersona','AdminController@guardarPersona');
Route::post('storeTipoContribuyente','AdminController@guardarTipoContribuyente');
Route::post('storeIdentificaciones','AdminController@guardarIdentificacion');
Route::post('storeProducto','AdminController@guardarProducto');
//Ruta Modificar
Route::post('updateCategoria/{id}','AdminController@modificarCategoria');
Route::post('updateMarca/{id}','AdminController@modificarMarca');
Route::post('updateUnidad/{id}','AdminController@modificarUnidad');
Route::post('updateCiudad/{id}','AdminController@modificarCiudad');
Route::post('updateProveedor/{id}','AdminController@modificarProveedor');
Route::post('updatePersona/{id}','AdminController@modificarPersona');
Route::post('updateTipoContribuyente/{id}','AdminController@modificarTipoContribuyente');
Route::post('updateIdentificaciones/{id}','AdminController@modificarIdentificacion');
Route::post('updateProducto/{id}','AdminController@modificarProducto');
//Ruta Pre-Modificar
Route::get('preupdateCategoria/{id}','AdminController@premodificarCategoria');
Route::get('preupdateMarca/{id}','AdminController@premodificarMarca');
Route::get('preupdateUnidad/{id}','AdminController@premodificarUnidad');
Route::get('preupdateCiudad/{id}','AdminController@premodificarCiudad');
Route::get('preupdateProveedor/{id}','AdminController@premodificarProveedor');
Route::get('preupdatePersona/{id}','AdminController@premodificarPersona');
Route::get('preupdateTipoContribuyente/{id}','AdminController@premodificarTipoContribuyente');
Route::get('preupdateIdentificaciones/{id}','AdminController@premodificarIdentificacion');
Route::get('preupdateProducto/{id}','AdminController@premodificarProducto');


