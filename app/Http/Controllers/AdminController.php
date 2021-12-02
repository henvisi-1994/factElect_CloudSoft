<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;
use App\Fecha_periodo;
use App\Categoria;
use App\Marca;
use App\Unidad;
use App\Ciudad;
use App\Persona;
use App\Pais;
use App\Proveedor;
use App\Producto;
use App\Identificaciones;
use App\TipoContribuyente;
use App\Roles;
use App\Formulario;
use App\FormaPago;
use App\Factura;
use App\Periodo;
use App\Bodega;
use App\Iva;
use App\Param_Docs;
use App\Param_Porc;
use App\Provincia;
use App\Descuento;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function inicio()
    {
        return view('admin.index');
    }
    public function Compras()
    {
        $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
        $marcas = Marca::get();
        $unidades = Unidad::get();
        $proveedores = DB::select('SELECT id_prov ,nombre_emp, nomb_fec, cod_prov,nombre_per,apel_per,obser_prov,estado_prov,fechaini_prov,fechafin_prov FROM proveedor
        INNER JOIN empresa ON proveedor.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON proveedor.id_fec= fecha_periodo.id_fec
        INNER JOIN persona ON proveedor.id_per= persona.id_per');
        $productos = DB::select('SELECT id_prod,nombre_emp, nomb_fec, codigo_prod,codbarra_prod,descripcion_prod,nomb_marca,present_prod,precio_prod,ubicacion_prod,stockmin_prod,stockmax_prod,fechaing_prod,fechaelab_prod,fechacad_prod,aplicaiva_prod,aplicaice_prod,util_prod,comision_prod,imagen_prod,observ_prod,estado_prod,fechaini_prod,fechafin_prod FROM producto
      INNER JOIN empresa ON producto.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON producto.id_fec= fecha_periodo.id_fec
      INNER JOIN marca ON producto.id_marca= marca.id_marca');
       $personas = DB::select('SELECT persona.id_per,persona.doc_per,persona.organiz_per,persona.nombre_per,persona.apel_per,persona.direc_per,persona.fono1_per,persona.fono2_per,persona.cel1_per,
        persona.cel2_per,persona.fecnac_per,persona.correo_per,persona.estado_per,persona.fechaini_per,persona.fechafin_per,tip_contrib.nomb_contrib,ciudad.nomb_ciu,identificacion.sri_ident
        FROM persona
      INNER JOIN tip_contrib ON persona.id_contrib= tip_contrib.id_contrib
      INNER JOIN ciudad ON persona.id_ciu = ciudad.id_ciu
      INNER JOIN identificacion ON persona.id_ident = identificacion.id_ident WHERE persona.apel_per IS NULL');
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        //$personas = Persona::get();
        $tipoContribuyentes = TipoContribuyente::get();
        $identificaciones = Identificaciones::get();
        $ciudades = Ciudad::get();
        return view('admin.compras', compact('categorias', 'marcas', 'unidades', 'proveedores', 'productos', 'empresas', 'fechas', 'personas', 'tipoContribuyentes', 'identificaciones', 'ciudades'));
    }
    public function Ventas()
    {
        $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
        $marcas = Marca::get();
        $unidades = Unidad::get();
        $proveedores = DB::select('SELECT id_prov ,nombre_emp, nomb_fec, cod_prov,nombre_per,apel_per,obser_prov,estado_prov,fechaini_prov,fechafin_prov FROM proveedor
        INNER JOIN empresa ON proveedor.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON proveedor.id_fec= fecha_periodo.id_fec
        INNER JOIN persona ON proveedor.id_per= persona.id_per');
        $productos = DB::select('SELECT id_prod,nombre_emp, nomb_fec, codigo_prod,codbarra_prod,descripcion_prod,nomb_marca,present_prod,precio_prod,ubicacion_prod,stockmin_prod,stockmax_prod,fechaing_prod,fechaelab_prod,fechacad_prod,aplicaiva_prod,aplicaice_prod,util_prod,comision_prod,imagen_prod,observ_prod,estado_prod,fechaini_prod,fechafin_prod FROM producto
      INNER JOIN empresa ON producto.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON producto.id_fec= fecha_periodo.id_fec
      INNER JOIN marca ON producto.id_marca= marca.id_marca');
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $ciudades = Ciudad::get();
        $tipoContribuyentes = TipoContribuyente::get();
        $identificaciones = Identificaciones::get();
        $bodegas = Bodega::get();
        return view('admin.ventas', compact('categorias', 'marcas', 'unidades', 'proveedores', 'productos', 'bodegas', 'empresas', 'fechas', 'ciudades', 'tipoContribuyentes', 'identificaciones'));
    }
    public function configuracion()
    {
        $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
        $marcas = Marca::get();
        $paises = Pais::get();
        $provincias = Provincia::get();
        $unidades = Unidad::get();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $ciudades = Ciudad::get();
        $tipoContribuyentes = TipoContribuyente::get();
        $identificaciones = Identificaciones::get();
        $descuentos = Descuento::get();
        $bodegas = Bodega::get();
        $roles = Roles::get();

        return view('admin.configuracion', compact('categorias', 'paises', 'provincias', 'unidades', 'marcas', 'empresas', 'fechas', 'ciudades', 'tipoContribuyentes', 'identificaciones', 'descuentos', 'bodegas', 'empresas', 'roles'));
    }
    public function Ubicacion()
    {
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $provincias = Provincia::get();
        $paises = Pais::get();
        return view('admin.ubicacion', compact('paises', 'fechas', 'empresas', 'provincias', 'paises'));
    }

    public function contabilidad()
    {
        $formularios = Formulario::get();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $param_docs = Param_Docs::get();
        $param_porc = Param_Porc::get();

        return view('admin.contabilidad', compact('formularios', 'empresas', 'fechas', 'param_docs', 'param_porc'));
    }
}