<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;
use App\Fecha_periodo;
use App\Categoria;
use App\Marca;
use App\Unidad;
use App\Ciudad;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
  public function inicio()
  {
  	return view('admin.index');
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
}
