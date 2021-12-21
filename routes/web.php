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
Route::get('Ciudad', 'CiudadController@Ciudad');
Route::get('Persona', 'PersonaController@Persona');
Route::get('PersonaSA', 'PersonaController@PersonaSA');
Route::get('/admin', 'AdminController@inicio')->middleware('auth');
Route::get('Compras', 'AdminController@Compras')->middleware('auth');
Route::get('Ventas', 'AdminController@ventas')->middleware('auth');
Route::get('Configuracion', 'AdminController@configuracion');
Route::get('Contabilidad', 'AdminController@contabilidad')->middleware('auth');
Route::get('TipoContribuyente', 'TipoContribuyenteController@TipoContribuyente');
Route::get('Identificaciones', 'IdentificacionesController@Identificaciones');
Route::get('Pais', 'PaisController@Pais');
Route::get('Provincia', 'ProvinciaController@Provincia');
Route::get('Cliente', 'ClienteController@Cliente');
Route::get('Param_Docs', 'Param_DocsController@Param_Docs');
Route::get('Param_Porc', 'Param_PorcController@Param_Porc');
Route::get('Dashboard_Ventas', 'FacturaController@dashboard_ventas');
Route::get('Dashboard_Compras', 'FacturaController@dashboard_compras');
Route::get('Cajeros', 'FacturaController@asignar_cajero');
//Configuracion
Route::get('Categoria', 'CategoriaController@Categoria')->middleware('auth');
Route::get('Marca', 'MarcaController@Marca')->middleware('auth');
Route::get('Unidad', 'UnidadController@Unidad')->middleware('auth');
Route::get('Descuento', 'DescuentoController@Descuento')->middleware('auth');
Route::get('Ubicacion', 'AdminController@Ubicacion')->middleware('auth');
Route::get('Empresa', 'EmpresaController@Empresa')->middleware('auth');
Route::get('Bodega', 'BodegaController@Bodega')->middleware('auth');
Route::get('/Usuarios', [App\Http\Controllers\UserController::class, 'Usuarios'])->middleware('auth');

//Obtener
Route::get('getProveedor', 'ProveedorController@getProveedor');
Route::get('getProductos', 'ProductoController@getProducto');
Route::get('getCategorias', 'CategoriaController@getCategoria');
Route::get('getUnidad', 'UnidadController@getUnidad');
Route::get('getMarca', 'MarcaController@getMarca');
Route::get('getCiudad', 'CiudadController@getCiudad');
Route::get('getTipoContribuyente', 'TipoContribuyenteController@getTipoContribuyente');
Route::get('getIdentificacion', 'IdentificacionesController@getIdentificacion');
Route::get('getBodega', 'BodegaController@getBodega');
Route::get('getPais', 'PaisController@getPais');
Route::get('getProvincia', 'ProvinciaController@getProvincia');
Route::get('getEmpresa', 'EmpresaController@getEmpresa');
Route::get('getRol', 'RolesController@getRoles');
Route::get('getCliente', 'ClienteController@getCliente');
Route::get('getDescuento', 'DescuentoController@getDescuento');
Route::get('getFormulario', 'FormularioController@getFormulario');
Route::get('getFormaPago', 'FormaPagoController@getFormaPago');
Route::get('getParam_Docs', 'Param_DocsController@getParam_Docs');
Route::get('getParam_Porc', 'Param_PorcController@getParam_Porc');
Route::get('getPeriodo', 'PeriodoController@getPeriodo');
Route::get('getTipoDocumento', 'TipoDocumentoController@getTipoDocumento');
Route::get('getUsuario', 'UserController@getUsuario');
Route::get('getFacturaCompra', 'FacturaController@getFacturaCompra');
Route::get('getFacturaVenta', 'FacturaController@getFacturaVenta');
Route::get('getIvaActual', 'IvaController@ivaActual');
Route::get('getNumFactVent', 'FacturaController@ultimonumFactVenta');
Route::get('getNumProfVenta', 'FacturaController@ultimonumFacProforma');
Route::get('DVentas', 'FacturaController@getVentas');
Route::get('DCompras', 'FacturaController@getCompras');
Route::get('ObtenerFactura', 'FacturaController@leer_xml');
Route::get('DescargaFactura/{id_fact}', 'FacturaController@download_factura');
Route::get('DescargaRCompra/{mes}', 'ReportesController@download_rCompra');
Route::get('DescargaRVenta/{mes}', 'ReportesController@download_rVentas');
Route::get('getProforma', 'FacturaController@getProforma');
Route::get('getEmpleado', 'EmpleadoController@getEmpleados');
Route::get('getReporteVenta', 'ReportesController@reporte_ventas');
Route::get('getReporteCompra', 'ReportesController@reporte_compras');
Route::get('ReporteCompra', 'ReportesController@index');
Route::get('ReporteVenta', 'ReportesController@index_venta');
Route::get('getUltimoUsuario', 'EmpleadoController@ultimo_usuario');



//Ruta Guardar
Route::post('storeCategoria', 'CategoriaController@guardarCategoria');
Route::post('storeMarca', 'MarcaController@guardarMarca');
Route::post('storeUnidad', 'UnidadController@guardarUnidad');
Route::post('storeCiudad', 'CiudadController@guardarCiudad');
Route::post('storeProveedor', 'ProveedorController@guardarProveedor');
Route::post('storePersona', 'PersonaController@guardarPersona');
Route::post('storeTipoContribuyente', 'TipoContribuyenteController@guardarTipoContribuyente');
Route::post('storeIdentificaciones', 'IdentificacionesController@guardarIdentificacion');
Route::post('storeEmpleado', 'EmpleadoController@guardarEmpleado');
Route::post('storeUsuarioEmpleado', 'EmpleadoController@guardarUsuarioEmpleado');
Route::post('/storeProducto', [App\Http\Controllers\ProductoController::class, 'guardarProducto']);

Route::post('storeBodega', 'BodegaController@guardarBodega');
Route::post('storePais', 'PaisController@guardarPais');
Route::post('storeProvincia', 'ProvinciaController@guardarProvincia');
Route::post('storeRol', 'RolesController@guardarRol');
Route::post('storeEmpresa', 'EmpresaController@guardarEmmpresa');
Route::post('storeCliente', 'ClienteController@guardarCliente');
Route::post('storeDescuento', 'DescuentoController@guardarDescuento');
Route::post('storeFormulario', 'FormularioController@guardarFormulario');
Route::post('storeFormaPago', 'FormaPagoController@guardarFormapago');
Route::post('storeParam_Docs', 'Param_DocsController@guardarParam_Docs');
Route::post('storeParam_Porc', 'Param_PorcController@guardarParam_Porc');
Route::post('storePeriodo', 'PeriodoController@guardarPeriodo');
Route::post('storeTipoDocumento', 'TipoDocumentoController@guardarTipoDocumento');
Route::post('storeUsuario', 'UserController@guardarUsuario');
Route::post('storeFactura', 'FacturaController@guardarFacturaVenta');
Route::post('storeFacturaCompra', 'FacturaController@guardarFacturaCompra');
Route::post('storeFacturaDetalle/{num_fact}', 'DetalleFacturaController@guardarDetalleFacturaVenta');
//Ruta Modificar
Route::post('preguardarFacturaVenta', 'FacturaController@preguardarFacturaVenta');
Route::post('updateCategoria/{id}', 'CategoriaController@modificarCategoria');
Route::post('updateMarca/{id}', 'MarcaController@modificarMarca');
Route::post('updateUnidad/{id}', 'UnidadController@modificarUnidad');
Route::post('updateCiudad/{id}', 'CiudadController@modificarCiudad');
Route::post('updateProveedor/{id}', 'ProveedorController@modificarProveedor');
Route::post('updatePersona/{id}', 'PersonaController@modificarPersona');
Route::post('updateTipoContribuyente/{id}', 'TipoContribuyenteController@modificarTipoContribuyente');
Route::post('updateIdentificacion/{id}', 'IdentificacionesController@modificarIdentificacion');
Route::post('updateProducto/{id}', 'ProductoController@modificarProducto');
Route::post('updateBodega/{id}', 'BodegaController@modificarBodega');
Route::post('updatePais/{id}', 'PaisController@modificarPais');
Route::post('updateProvincia/{id}', 'ProvinciaController@modificarProvincia');
Route::post('updateEmpresa/{id}', 'EmpresaController@modificarEmpresa');
Route::post('updateRol/{id}', 'RolesController@modificarRol');
Route::post('updateCliente/{id}', 'ClienteController@modificarCliente');
Route::post('updateDescuento/{id}', 'DescuentoController@modificarDescuento');
Route::post('updateFormulario/{id}', 'FormularioController@modificarFormulario');
Route::post('updateFormaPago/{id}', 'FormaPagoController@modificarFormaPago');
Route::post('updateParam_Docs/{id}', 'Param_DocsController@modificarParam_Docs');
Route::post('updateParam_Porc/{id}', 'Param_PorcController@modificarParam_Porc');
Route::post('updatePeriodo/{id}', 'PeriodoController@modificarPeriodo');
Route::post('updateTipoDocumento/{id}', 'TipoDocumentoController@modificarTipoDocumento');
Route::post('updateEmpleado/{id}', 'EmpleadoController@modificarEmpleado');
Route::post('updateUsuaurio/{id}', 'UserController@modificarUsuario');
//Ruta Eliminar
Route::post('deleteMarca/{id}', 'MarcaController@eliminarMarca');
Route::post('deleteUnidad/{id}', 'UnidadController@eliminarUnidad');
Route::post('deleteIdentificacion/{id}', 'IdentificacionesController@eliminarIdentificacion');
Route::post('deleteTipoContribuyente/{id}', 'TipoContribuyenteController@eliminarTipoContribuyente');
Route::post('deleteCategoria/{id}', 'CategoriaController@eliminarCategoria');
Route::post('deleteProducto/{id}', 'ProductoController@eliminarProducto');
Route::post('deletePersona/{id}', 'PersonaController@eliminarPersona');
Route::post('deleteEmpleado/{id}', 'EmpleadoController@eliminarEmpleado');
Route::post('deleteProveedor/{id}', 'ProveedorController@eliminarProveedor');
Route::post('deleteBodega/{id}', 'BodegaController@eliminarBodega');
Route::post('deletePais/{id}', 'PaisController@eliminarPais');
Route::post('deleteProvincia/{id}', 'ProvinciaController@eliminarProvincia');
Route::post('deleteEmpresa/{id}', 'EmpresaController@eliminarEmpresa');
Route::post('deleteRol/{id}', 'RolesController@eliminarRol');
Route::post('deleteCliente/{id}', 'ClienteController@eliminarCliente');
Route::post('deleteDescuento/{id}', 'DescuentoController@eliminarDescuento');
Route::post('deleteFormulario/{id}', 'FormularioController@eliminarFormulario');
Route::post('deleteFormaPago/{id}', 'FormaPagoController@eliminarFormaPago');
Route::post('deleteParam_Docs/{id}', 'Param_DocsController@eliminarParam_Docs');
Route::post('deleteParam_Porc/{id}', 'Param_PorcController@eliminarParam_Porc');
Route::post('deletePeriodo/{id}', 'PeriodoController@eliminarPeriodo');
Route::post('deleteTipoDocumento/{id}', 'TipoDocumentoController@eliminarTipoDocumento');
Route::post('deleteUsuario/{id}', 'UserController@eliminarUsuario');
Route::post('deleteCiudad/{id}', 'CiudadController@eliminarCiudad');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');