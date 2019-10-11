<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Fecha_periodo;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CiudadController extends Controller
{
    public function Ciudad()
    {
      $ciudades = DB::select('SELECT ciudad.id_ciu,ciudad.nomb_ciu,ciudad.estado_ciu,ciudad.fechaini_ciu,ciudad.fechafin_ciu,ciudad.observ_ciu,empresa.nombre_emp,fecha_periodo.nomb_fec FROM ciudad
        INNER JOIN empresa ON ciudad.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON ciudad.id_fec = fecha_periodo.id_fec');
          $empresas = Empresa::get();
          $fechas = Fecha_periodo::get();
        return view('admin.Ciudad.index',compact('ciudades','empresas','fechas'));
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

           $v =$this->validate(request(), [

              'nomb_ciu' => 'required',
              'id_emp' => 'required',
              'id_fec' => 'required',
              'estado_ciu' => 'required',
          ]);
          if ($v)
          {
            $ciudad= new Ciudad;
            $ciudad->create($request->all());
            return redirect('Compras');
          }
          else
          {
            return back()->withInput($request->all());
          }
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
          return;
      }
      public function getCiudad()
      {
        $ciudades = DB::table ('ciudad as ciu')
        ->join('empresa', 'ciu.id_emp', '=', 'empresa.id_emp')
        ->join('fecha_periodo', 'ciu.id_fec', '=', 'fecha_periodo.id_fec')
        ->orderBy("ciu.id_ciu","desc")
        ->get();
        return $ciudades;

      }
}
