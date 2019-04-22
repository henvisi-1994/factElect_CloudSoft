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
Route::get('Compras','AdminController@Compras');
Route::get('Ventas','AdminController@ventas');
Route::get('Configuracion','AdminController@configuracion');
Route::get('Contabilidad','AdminController@contabilidad');
Route::get('TipoContribuyente','AdminController@TipoContribuyente');
Route::get('Identificaciones','AdminController@Identificaciones');
Route::get('Bodega','AdminController@Bodega');
Route::get('Pais','AdminController@Pais');
Route::get('Provincia','AdminController@Provincia');
Route::get('Cliente','AdminController@Cliente');
Route::get('Descuento','AdminController@Descuento');
//Obtener
Route::get('getProveedor','AdminController@getProveedor');
Route::get('getProductos','AdminController@getProducto');
Route::get('getCategorias','AdminController@getCategoria');
Route::get('getUnidad','AdminController@getUnidad');
Route::get('getMarca','AdminController@getMarca');
Route::get('getCiudad','AdminController@getCiudad');
Route::get('getTipoContribuyente','AdminController@getTipoContribuyente');
Route::get('getIdentificacion','AdminController@getIdentificacion');
Route::get('getBodega','AdminController@getBodega');
Route::get('getPais','AdminController@getPais');
Route::get('getProvincia','AdminController@getProvincia');
Route::get('getEmpresa','AdminController@getEmpresa');
Route::get('getRol','AdminController@getRoles');
Route::get('getCliente','AdminController@getCliente');
Route::get('getDescuento','AdminController@getDescuento');
Route::get('getFormulario','AdminController@getFormulario');
Route::get('getFormaPago','AdminController@getFormaPago');

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
Route::post('storeBodega','AdminController@guardarBodega');
Route::post('storePais','AdminController@guardarPais');
Route::post('storeProvincia','AdminController@guardarProvincia');
Route::post('storeEmpresa','AdminController@guardarEmpresa');
Route::post('storeCliente','AdminController@guardarCliente');
Route::post('storeDescuento','AdminController@guardarDescuento');
Route::post('storeFormulario','AdminController@guardarFormulario');
Route::post('storeFormaPago','AdminController@guardarFormapago');
//Ruta Modificar
Route::post('updateCategoria/{id}','AdminController@modificarCategoria');
Route::post('updateMarca/{id}','AdminController@modificarMarca');
Route::post('updateUnidad/{id}','AdminController@modificarUnidad');
Route::post('updateCiudad/{id}','AdminController@modificarCiudad');
Route::post('updateProveedor/{id}','AdminController@modificarProveedor');
Route::post('updatePersona/{id}','AdminController@modificarPersona');
Route::post('updateTipoContribuyente/{id}','AdminController@modificarTipoContribuyente');
Route::post('updateIdentificacion/{id}','AdminController@modificarIdentificacion');
Route::post('updateProducto/{id}','AdminController@modificarProducto');
Route::post('updateBodega/{id}','AdminController@modificarBodega');
Route::post('updatePais/{id}','AdminController@modificarPais');
Route::post('updateProvincia/{id}','AdminController@modificarProvincia');
Route::post('updateEmpresa/{id}','AdminController@modificarEmpresa');
Route::post('updateRol/{id}','AdminController@modificarRol');
Route::post('updateCliente/{id}','AdminController@modificarCliente');
Route::post('updateDescuento/{id}','AdminController@modificarDescuento');
Route::post('updateFormulario/{id}','AdminController@modificarFormulario');
Route::post('updateFormaPago/{id}','AdminController@modificarFormaPago');
//Ruta Eliminar
Route::post('deleteMarca/{id}','AdminController@eliminarMarca');
Route::post('deleteUnidad/{id}','AdminController@eliminarUnidad');
Route::post('deleteIdentificacion/{id}','AdminController@eliminarIdentificacion');
Route::post('deleteTipoContribuyente/{id}','AdminController@eliminarTipoContribuyente');
Route::post('deleteCategoria/{id}','AdminController@eliminarCategoria');
Route::post('deleteProducto/{id}','AdminController@eliminarProducto');
Route::post('deletePersona/{id}','AdminController@eliminarPersona');
Route::post('deleteProveedor/{id}','AdminController@eliminarProveedor');
Route::post('deleteBodega/{id}','AdminController@eliminarBodega');
Route::post('deletePais/{id}','AdminController@eliminarPais');
Route::post('deleteProvincia/{id}','AdminController@eliminarProvincia');
Route::post('deleteEmpresa/{id}','AdminController@eliminarEmpresa');
Route::post('deleteRol/{id}','AdminController@eliminarRol');
Route::post('deleteCliente/{id}','AdminController@eliminarCliente');
Route::post('deleteDescuento/{id}','AdminController@eliminarDescuento');
Route::post('deleteFormulario/{id}','AdminController@eliminarFormulario');
Route::post('deleteFormaPago/{id}','AdminController@eliminarFormaPago');



