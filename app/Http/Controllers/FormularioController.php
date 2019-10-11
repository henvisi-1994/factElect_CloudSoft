<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulario;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class FormularioController extends Controller
{
    ///Formulario
    public function getFormulario()
    {
      $formulario = DB::table('codformulario as f')
      ->select(DB::raw('(SELECT nomb_codform FROM codformulario WHERE id_padcodform =id_codform)AS formPrincipal'),'id_padcodform','f.id_emp','.nombre_emp','f.id_fec','nomb_fec','nomb_codform','observ_codform','estado_codform','fechaini_codform','fechafin_codform')
       ->join('fecha_periodo','f.id_fec','=','fecha_periodo.id_fec')
      ->join('empresa','f.id_emp','=','empresa.id_emp')
      ->orderBy("f.id_codform","des")
      ->get();
      return $formulario;
    }
     public function guardarFormulario(Request $request)
    {
      $v= $this->validate(request(),[
            'nomb_codform' => 'required|string'
        ]);
       if($v)
      {
        $formulario= new Formulario();
        $formulario->create($request->all());
       return ;
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
    public function modificarFormulario(Request $request,$id)
    {
        $v= $this->validate(request(),[
            'nomb_rol' => 'required|string'
        ]);
       if($v)
      {
        $id_padcodform  =  $request->input('id_padcodform');
        $id_emp  =  $request->input('id_emp');
        $id_fec  =  $request->input('id_fec');
        $nomb_codform  =  $request->input('nomb_codform');
        $observ_codform  =  $request->input('observ_codform');
        $estado_codform  =  $request->input('estado_codform');
        $fechaini_codform  =  $request->input('fechaini_codform');
        $fechafin_codform  =  $request->input('fechafin_codform');

        DB::table('codformulario')
            ->where('id_codform', $id)
            ->update(  ['id_padcodform' => $id_padcodform,'id_emp' => $id_emp,'nomb_codform' => $nomb_codform,'observ_codform' => $observ_codform ,
  'estado_codform' => $estado_codform ,'fechaini_codform' => $fechaini_codform,'fechafin_codform' => $fechafin_codform]
          );
         return ;
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
      public function eliminarFormulario($id)
    {
        $estado_codform='I';
        DB::table('codformulario')
            ->where('id_codform', $id)
            ->update(['estado_codform' => $estado_codform]
          );
        return;
    }
}
