<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class TipoDocumentoController extends Controller
{
    //Tipo de Documento
    public function getTipoDocumento()
    {
      $periodo = DB::table('tipo_docum as td')
      ->orderBy("td.id_doc","des")
      ->get();
      return $periodo;
    }
     public function guardarTipoDocumento(Request $request)
    {
      $v= $this->validate(request(),[
            'nomb_doc' => 'required|string'
        ]);
       if($v)
      {
        $periodo= new TipoDocumento();
        $periodo->create($request->all());
       return ;
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
    public function modificarTipoDocumento(Request $request,$id)
    {
        $v= $this->validate(request(),[
            'nomb_doc' => 'required|string'
        ]);
       if($v)
      {
        $nomb_doc  =  $request->input('nomb_doc');
        $id_emp = $request->input('id_emp');
        $id_fec = $request->input('id_fec');
        $observ_doc  =  $request->input('observ_doc');
        $estado_doc  =  $request->input('estado_doc');
        $fechaini_doc  =  $request->input('fechaini_doc');
        $fechafin_doc  =  $request->input('fechafin_doc');

        DB::table('tipo_docum')
            ->where('id_doc', $id)
            ->update(  ['nomb_doc' => $nomb_doc,'observ_doc' => $observ_doc , 'id_emp' => $id_emp, 'id_fec' => $id_fec,
  'estado_doc' => $estado_doc ,'fechaini_doc' => $fechaini_doc,'fechafin_doc' => $fechafin_doc]
          );
         return ;
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
      public function eliminarTipoDocumento($id)
    {
        $estado_doc='I';
        DB::table('tipo_docum')
            ->where('id_doc', $id)
            ->update(['estado_doc' => $estado_doc]
          );
        return;
    }
}
