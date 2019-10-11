<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fecha_periodo;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class PeriodoController extends Controller
{
     /////Periodo
public function getPeriodo()
{
  $periodo = DB::table('fecha_periodo as fpe')
  ->orderBy("fpe.id_fec","des")
  ->get();
  return $periodo;
}
 public function guardarPeriodo(Request $request)
{
  $v= $this->validate(request(),[
        'nomb_fec' => 'required|string'
    ]);
   if($v)
  {
    $periodo= new Fecha_periodo();
    $periodo->create($request->all());
   return ;
      }
      else
  {
    return back()->withInput($request->all());
  }
}
public function modificarPeriodo(Request $request,$id)
{
    $v= $this->validate(request(),[
        'nomb_fec' => 'required|string'
    ]);
   if($v)
  {
    $nomb_fec  =  $request->input('nomb_fec');
    $mesidentif_fec = $request->input('mesidentif_fec');
    $observ_fec  =  $request->input('observ_fec');
    $estado_fec  =  $request->input('estado_fec');
    $fechaini_fec  =  $request->input('fechaini_fec');
    $fechafin_fec  =  $request->input('fechafin_fec');

    DB::table('fecha_periodo')
        ->where('id_fec', $id)
        ->update(  ['nomb_fec' => $nomb_fec,'observ_fec' => $observ_fec , 'mesidentif_fec' => $mesidentif_fec,
'estado_fec' => $estado_fec ,'fechaini_fec' => $fechaini_fec,'fechafin_fec' => $fechafin_fec]
      );
     return ;
      }
      else
  {
    return back()->withInput($request->all());
  }
}
  public function eliminarPeriodo($id)
{
    $estado_fec='I';
    DB::table('fecha_periodo')
        ->where('id_fec', $id)
        ->update(['estado_fec' => $estado_fec]
      );
    return;
}
}
