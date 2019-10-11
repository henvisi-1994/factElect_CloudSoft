<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Fecha_periodo;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class CategoriaController extends Controller
{
    public function Categoria()
  {
    $empresas = Empresa::get();
     $fechas = Fecha_periodo::get();
    return view('admin.Categoria.index',compact('empresas','fechas'));
  }
  public function getCategoria()
  {
   $categorias = DB::table('categoria as c')
      ->join('empresa', 'c.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'c.id_fec', '=', 'fecha_periodo.id_fec')
      ->orderBy("c.id_cat","desc")
      ->get();
      return $categorias;
  }
  public function CargarCategoria()
  {
  	$empresas = Empresa::get();
  	$fechas = Fecha_periodo::get();
  	return view('admin.Categoria.Crear',compact('empresas','fechas'));
  }
  //Funcion Guardar Categoria
  public function  guardarCategoria(Request $request)
  {
      $v=$this->validate(request(),[
          'nomb_cat' => 'required|string',
          'estado_cat' => 'required|string'
      ]);
              if ($v) {
                 $categoria= new Categoria;
                 $categoria->create($request->all());
                return ;
              }
              else
              {
                 return back()->withInput($request->all());
              }
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
      $observ_cat= $request->input('observ_cat');
      DB::table('categoria')
          ->where('id_cat', $id)
          ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'nomb_cat' => $nomb_cat, 'estado_cat' => $estado_cat , 'fechaini_cat' => $fechaini_cat, 'fechafin_cat' => $fechafin_cat,'observ_cat'=> $observ_cat]
        );
      return;
  }
      //eliminar Categoria
  public function eliminarCategoria($id)
  {
      $estado_cat='I';
      DB::table('categoria')
          ->where('id_cat', $id)
          ->update(['estado_cat' => $estado_cat]
        );
      return;
  }
}
