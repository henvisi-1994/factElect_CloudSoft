<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Param_Porc;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class Param_PorcController extends Controller
{
      //// Metodos Param_Porc

      public function Param_Porc()
      {
          $param_porc = Param_Porc::get();
          return view('admin.Param_Porc.index',compact('param_porc'));
      }
      public function CargarParam_Porc()
      {

          return view('admin.Param_Porc.Crear');
      }
          //Guardar Param_Porc
       public function  guardarParam_Porc(Request $request)
      {

          $v =$this->validate(request(), [

              'nomb_param_porc' => 'required',
              'observ_param_porc' => 'required',
              'estado_param_porc' => 'required',
              'fechaini_param_porc' => 'required',
              'fechafin_param_porc' => 'required'
          ]);
          if ($v)
          {
              $param_porc= new Param_Porc();
              $param_porc->id_emp=$request->input('id_emp');
              $param_porc->id_fec=$request->input('id_fec');
              $param_porc->nomb_param_porc=$request->input('nomb_param_porc');
              $param_porc->observ_param_porc=$request->input('observ_param_porc');
              $param_porc->estado_param_porc=$request->input('estado_param_porc');
              $param_porc->fechaini_param_porc=$request->input('fechaini_param_porc');
              $param_porc->fechafin_param_porc=$request->input('fechafin_param_porc');
              $param_porc->save();
              return;
          }
          else
          {
            return back()->withInput($request->all());
          }

      }
       //Modificar Param_Porc
      public function  modificarParam_Porc(Request $request,$id)
      {

         $v =$this->validate(request(), [

              'nomb_param_porc' => 'required',
              'observ_param_porc' => 'required',
              'estado_param_porc' => 'required',
              'fechaini_param_porc' => 'required',
              'fechafin_param_porc' => 'required'
          ]);
          if ($v)
          {
              $id_emp=$request->input('id_emp');
              $id_fec=$request->input('id_fec');
              $nomb_param_porc=$request->input('nomb_param_porc');
              $observ_param_porc=$request->input('observ_param_porc');
              $estado_param_porc=$request->input('estado_param_porc');
              $fechaini_param_porc=$request->input('fechaini_param_porc');
              $fechafin_param_porc=$request->input('fechafin_param_porc');
              DB::table('param_porc')
              ->where('id_param_porc', $id)
              ->update(['nomb_param_porc' => $nomb_param_porc, 'observ_param_porc' => $observ_param_porc , 'estado_param_porc' => $estado_param_porc, 'fechaini_param_porc' => $fechaini_param_porc,'fechafin_param_porc'=> $fechafin_param_porc,'id_emp'=> $id_emp,'id_fec'=> $id_fec]
            );
          return;
        }
        else
          {
            return back()->withInput($request->all());
          }
      }
      //EliminarParam_Porc
      public function  eliminarParam_Porc($id)
      {
          $estado_param_porc= 'I';
          DB::table('param_porc')
              ->where('id_param_porc', $id)
              ->update(['estado_param_porc' => $estado_param_porc]
            );
          return;
      }


       public function getParam_Porc()
      {
        $param_porc = DB::table('param_porc as p')
        ->join('empresa', 'p.id_emp', '=', 'empresa.id_emp')
        ->join('fecha_periodo', 'p.id_fec', '=', 'fecha_periodo.id_fec')
        ->orderBy("p.id_param_porc","desc")
        ->get();
        return $param_porc;
      }
}
