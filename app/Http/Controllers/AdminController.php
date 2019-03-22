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
use App\Proveedor;
use App\Identificaciones;
use App\TipoContribuyente;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
  public function inicio()
  {
  	return view('admin.index');
  }
  public function Compras()
  {
    return view('admin.compras');
  }
  
  public function Categoria()
  {
    $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
      return view('admin.Categoria.index',compact('categorias'));
  }
public function Marca()
{
  $marcas = Marca::get();
  return view('admin.Marca.index',compact('marcas'));
}

public function Unidad()
{
  $unidades = Unidad::get();
  return view('admin.Unidad.index',compact('unidades'));
}
  public function CargarCategoria()
  {
  	$empresas = Empresa::get();
  	$fechas = Fecha_periodo::get();
  	return view('admin.Categoria.Crear',compact('empresas','fechas'));
  }
   public function CargarMarca()
  {

  	return view('admin.Marca.Crear');
  }
     public function CargarUnidad()
  {

  	return view('admin.Unidad.Crear');
  }
  //Funcion Guardar Categoria
    public function  guardarCategoria(Request $request)
    {
        $categoria= new Categoria;
        $categoria->create($request->all());
        return redirect('addCategoria');
    }
     //Pre modificar Categoria
    public function  premodificarCategoria(Request $request,$id)
    {
        $categoria= Categoria::where('id_cat',$id)->first();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        return view('admin.Categoria.Modificar',compact('categoria','empresas','fechas'));
    }
    //Modificar Categoria
    public function  modificarCategoria(Request $request,$id)
    {
        $id_emp= $request->input('id_emp');
        $id_fec= $request->input('id_fec');
        $nomb_cat= $request->input('nomb_cat');
        $estado_cat= $request->input('estado_cat');
        $fechaini_cat= $request->input('fechaini_cat');
        $fechafin_cat= $request->input('fechafin_cat');
        $observ_cat= $request->input('fechaini_cat');
        DB::table('categoria')
            ->where('id_cat', $id)
            ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'nomb_cat' => $nomb_cat, 'estado_cat' => $estado_cat , 'fechaini_cat' => $fechaini_cat, 'fechafin_cat' => $fechafin_cat,'observ_cat'=> $observ_cat]
          );
        return redirect('Categoria');
    }

    //Guardar Marca
     public function  guardarMarca(Request $request)
    {
        $marca= new Marca;
        $marca->create($request->all());
        return redirect('addMarca');
    }
    //Pre modificar Marca
    public function  premodificarMarca(Request $request,$id)
    {
        $marca= Marca::where('id_marca',$id)->first();
        return view('admin.Marca.Modificar',compact('marca'));
    }
     //Modificar Marca
    public function  modificarMarca(Request $request,$id)
    {
        $nomb_marca= $request->input('nomb_marca');
        $estado_marca= $request->input('estado_marca');
        $fechaini_marca= $request->input('fechaini_marca');
        $fechafin_marca= $request->input('fechafin_marca');
        $observ_marca= $request->input('observ_marca');
        DB::table('marca')
            ->where('id_marca', $id)
            ->update(['nomb_marca' => $nomb_marca, 'estado_marca' => $estado_marca , 'fechaini_marca' => $fechaini_marca, 'fechafin_marca' => $fechafin_marca,'observ_marca'=> $observ_marca]
          );
        return redirect('Marca');
    }
    //Guardar Unidad
      public function  guardarUnidad(Request $request)
    {
        $unidad= new Unidad;
        $unidad->create($request->all());
        return redirect('addUnidad');
    }
     //Pre modificar Unidad
    public function  premodificarUnidad(Request $request,$id)
    {
        $unidad= Unidad::where('id_unidad',$id)->first();
        return view('admin.Unidad.Modificar',compact('unidad'));
    }
     //Modificar Unidad
    public function  modificarUnidad(Request $request,$id)
    {
        $nomb_unidad= $request->input('nomb_unidad');
        $estado_unidad= $request->input('estado_unidad');
        $fechaini_unidad= $request->input('fechaini_unidad');
        $fechafin_unidad= $request->input('fechafin_unidad');
        $observ_unidad= $request->input('observ_unidad');
        DB::table('unidad')
            ->where('id_unidad', $id)
            ->update(['nomb_unidad' => $nomb_unidad, 'estado_unidad' => $estado_unidad , 'fechaini_unidad' => $fechaini_unidad, 'fechafin_unidad' => $fechafin_unidad,'observ_unidad'=> $observ_unidad]
          );
        return redirect('Unidad');
    }

      public function Ciudad()
  {
    $ciudades = DB::select('SELECT ciudad.id_ciu,ciudad.nomb_ciu,ciudad.estado_ciu,ciudad.fechaini_ciu,ciudad.fechafin_ciu,ciudad.observ_ciu,empresa.nombre_emp,fecha_periodo.nomb_fec FROM ciudad
      INNER JOIN empresa ON ciudad.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON ciudad.id_fec = fecha_periodo.id_fec');
      return view('admin.Ciudad.index',compact('ciudades'));
  }
  //Funcion de Cargar Ciudad
   public function CargarCiudad()
  {
    $empresas = Empresa::get();
    $fechas = Fecha_periodo::get();
    return view('admin.Ciudad.Crear',compact('empresas','fechas'));
  }
    //Funcion Guardar Ciudad
    public function  guardarCiudad(Request $request)
    {
        $ciudad= new Ciudad;
        $ciudad->create($request->all());
        return redirect('addCiudad');
    }
      //Pre modificar Ciudad
    public function  premodificarCiudad(Request $request,$id)
    {
        $ciudad= Ciudad::where('id_ciu',$id)->first();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        return view('admin.Ciudad.Modificar',compact('ciudad','empresas','fechas'));
    }
    //Modificar Ciudad
    public function  modificarCiudad(Request $request,$id)
    {
        $id_emp =  $request->input('id_emp');
        $id_fec =  $request->input('id_fec');
        $nomb_ciu =  $request->input('nomb_ciu');
        $estado_ciu =  $request->input('estado_ciu');
        $fechaini_ciu =  $request->input('fechaini_ciu');
        $fechafin_ciu =  $request->input('fechafin_ciu');
        $observ_ciu =  $request->input('observ_ciu');
        DB::table('ciudad')
            ->where('id_ciu', $id)
            ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'nomb_ciu' => $nomb_ciu, 'estado_ciu' => $estado_ciu , 'fechaini_ciu' => $fechaini_ciu, 'fechafin_ciu' => $fechafin_ciu,'observ_ciu'=> $observ_ciu]
          );
        return redirect('Ciudad');
    }  
    public function Proveedor()
    {
       $proveedores = DB::select('SELECT id_prov ,nombre_emp, nomb_fec, cod_prov,nombre_per,apel_per,obser_prov,estado_prov,fechaini_prov,fechafin_prov FROM proveedor
        INNER JOIN empresa ON proveedor.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON proveedor.id_fec= fecha_periodo.id_fec
        INNER JOIN persona ON proveedor.id_per= persona.id_per');
       return view('admin.Proveedor.index',compact('proveedores'));
    }
    public function CargarProveedor()
    {
    $empresas = Empresa::get();
    $fechas = Fecha_periodo::get();
    $personas = Persona::get();
    return view('admin.Proveedor.Crear',compact('empresas','fechas','personas'));
    }

    public function guardarProveedor(Request $request)
    {
      $proveedor = new Proveedor;
      $proveedor->create($request->all());
      return redirect('Proveedor');

    }
    public function premodificarProveedor(Request $request,$id)
    {
        $proveedor = Proveedor::where('id_prov',$id)->first();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $personas= Persona::get();
        return view('admin.Proveedor.Modificar',compact('proveedor','empresas','fechas','personas'));
    }
    public function modificarProveedor(Request $request,$id)
    {

      $id_emp  =  $request->input('id_emp');
      $id_fec =  $request->input('id_fec');
      $cod_prov =  $request->input('cod_prov');
      $id_per =  $request->input('id_per');
      $obser_prov =  $request->input('obser_prov');
      $estado_prov =  $request->input('estado_prov');
      $fechaini_prov =  $request->input('fechaini_prov');
      $fechafin_prov =  $request->input('fechafin_prov');
       DB::table('proveedor')
            ->where('id_prov', $id)
            ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'cod_prov' => $cod_prov, 'id_per' => $id_per,'obser_prov' => $obser_prov ,'estado_prov' => $estado_prov, 'fechaini_prov' => $fechaini_prov, 'fechafin_prov' => $fechafin_prov]
          );
       return redirect('Proveedor');

    }
//Persona
  public function Persona()
  {
    $persona = DB::select('SELECT persona.id_per,persona.doc_per,persona.organiz_per,persona.nombre_per,persona.apel_per,persona.direc_per,persona.fono1_per,persona.fono2_per,persona.cel1_per,
persona.cel2_per,persona.fecnac_per,persona.correo_per,persona.estado_per,persona.fechaini_per,persona.fechafin_per,tip_contrib.nomb_contrib,ciudad.nomb_ciu,identificacion.sri_ident
 FROM persona
      INNER JOIN tip_contrib ON persona.id_contrib= tip_contrib.id_contrib
      INNER JOIN ciudad ON persona.id_ciu = ciudad.id_ciu
      INNER JOIN identificacion ON persona.id_ident = identificacion.id_ident');
      return view('admin.Persona.index',compact('persona'));
  }
  //Funcion de Cargar Persona
   public function CargarPersona()
  {
    $tipoContribuyentes = TipoContribuyente::get();
    $ciudades = Ciudad::get();
    $identificaciones = Identificaciones::get();
    return view('admin.Persona.Proveedor',compact('tipoContribuyentes','ciudades','identificaciones'));
  }
    //Funcion Guardar Persona
    public function  guardarPersona(Request $request)
    {
        $persona= new Persona;
        $persona->create($request->all());
        $id_per = $persona->id_per;
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $personas = Persona::get();
        return view('admin.Proveedor.Crear',compact('empresas','fechas','personas','id_per'));
    }
      //Pre modificar Persona
    public function  premodificarPersona(Request $request,$id)
    {
        $persona= Persona::where('id_per',$id)->first();
        $tipoContribuyentes= TipoContribuyente::get();
        $identificaciones = Identificaciones::get();
        $ciudades = Ciudad::get();
        return view('admin.Persona.Modificar',compact('persona','tipoContribuyentes','identificaciones','ciudades'));
    }
    //Modificar Persona
    public function  modificarPersona(Request $request,$id)
    {
        $id_contrib =  $request->input('id_contrib');
        $id_ident =  $request->input('id_ident');
        $id_ciu =  $request->input('id_ciu');
        $doc_per =  $request->input('doc_per');
        $organiz_per =  $request->input('organiz_per');
        $nombre_per =  $request->input('nombre_per');
        $apel_per =  $request->input('apel_per');
        $direc_per =  $request->input('direc_per');
        $fono1_per =  $request->input('fono1_per');
        $fono2_per =  $request->input('fono2_per');
        $cel1_per =  $request->input('cel1_per');
        $cel2_per =  $request->input('cel2_per');
        $fecnac_per =  $request->input('fecnac_per');
        $correo_per =  $request->input('correo_per');
        $estado_per =  $request->input('estado_per');
        $fechaini_per =  $request->input('fechaini_per');
        $fechafin_per =  $request->input('fechafin_per');
        DB::table('persona')
            ->where('id_per', $id)
            ->update(['id_contrib' => $id_contrib,'id_ident' => $id_ident,'id_ciu' => $id_ciu, 'doc_per' => $doc_per , 'organiz_per' => $organiz_per, 'nombre_per' => $nombre_per,'apel_per'=> $apel_per,'direc_per'=> $direc_per,'fono1_per'=> $fono1_per,'fono2_per'=> $fono2_per,'cel1_per'=> $cel1_per,'cel2_per'=> $cel2_per,'fecnac_per'=> $fecnac_per,'correo_per'=> $correo_per,'estado_per'=> $estado_per,'fechaini_per'=> $fechaini_per,'fechafin_per'=> $fechafin_per]
          );
        return redirect('Persona');
    }
    public function TipoContribuyente()
    {
        $tiposContribuyentes = TipoContribuyente::get();
        return view('admin.TipoContribuyente.index',compact('tiposContribuyentes'));
    }
    public function CargarTipoContribuyente()
    {

        return view('admin.TipoContribuyente.Crear');
    }
        //Guardar TipoContribuyente
     public function  guardarTipoContribuyente(Request $request)
    {
        $tiposContribuyentes= new TipoContribuyente;
        $tiposContribuyentes->create($request->all());
        return redirect('addTipoContribuyente');
    }
    //Pre modificar Tipo Contribuyente
    public function  premodificarTipoContribuyente(Request $request,$id)
    {
        $tiposContribuyentes= TipoContribuyente::where('id_contrib',$id)->first();
        return view('admin.TipoContribuyente.Modificar',compact('tiposContribuyentes'));
    }
     //Modificar Tipo Contribuyente
    public function  modificarTipoContribuyente(Request $request,$id)
    {
        $nomb_contrib= $request->input('nomb_contrib');
        $obser_contrib= $request->input('obser_contrib');
        $estado_contrib= $request->input('estado_contrib');
        $fechaini_contrib= $request->input('fechaini_contrib');
        $fechafin_contrib= $request->input('fechafin_contrib');
        DB::table('tip_contrib')
            ->where('id_contrib', $id)
            ->update(['nomb_contrib' => $nomb_contrib, 'obser_contrib' => $obser_contrib , 'estado_contrib' => $estado_contrib, 'fechaini_contrib' => $fechaini_contrib,'fechafin_contrib'=> $fechafin_contrib]
          );
        return redirect('TipoContribuyente');
    }

    //Funcion Identificaciones
     public function Identificaciones()
    {
        $identificacion = Identificaciones::get();
        return view('admin.Identificaciones.index',compact('identificacion'));
    }
    public function CargarIdentificaciones()
    {

        return view('admin.Identificaciones.Crear');
    }
        //Guardar Identificacion
     public function  guardarIdentificacion(Request $request)
    {
        $identificacion= new Identificaciones;
        $identificacion->create($request->all());
        return redirect('addIdentificacion');
    }
    //Pre modificar Identificacion
    public function  premodificarIdentificacion(Request $request,$id)
    {
        $identificacion= Identificaciones::where('id_ident',$id)->first();
        return view('admin.Identificaciones.Modificar',compact('identificacion'));
    }
     //Modificar Tipo Identificacion
    public function  modificarIdentificacion(Request $request,$id)
    {
        $sri_ident= $request->input('sri_ident');
        $descrip_ident= $request->input('descrip_ident');
        $observ_ident= $request->input('observ_ident');
        $estado_ident= $request->input('estado_ident');
        $fechaini_ident= $request->input('fechaini_ident');
        $fechafin_ident= $request->input('fechafin_ident');
        DB::table('identificacion')
            ->where('id_ident', $id)
            ->update(['sri_ident' => $sri_ident, 'descrip_ident' => $descrip_ident , 'observ_ident' => $observ_ident, 'estado_ident' => $estado_ident,'fechaini_ident'=> $fechaini_ident,'fechafin_ident'=> $fechafin_ident]
          );
        return redirect('Identificaciones');
    }

}
