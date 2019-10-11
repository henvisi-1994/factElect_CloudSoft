<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Param_Docs;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class Param_DocsController extends Controller
{
        /////////////////////////////
    //// Metodos Param_DOCS

    public function Param_Docs()
    {
        $param_docs = Param_Docs::get();
        return view('admin.Param_Docs.index',compact('param_docs'));
    }
    public function CargarParam_Docs()
    {

        return view('admin.Param_Docs.Crear');
    }
        //Guardar Param_docs
     public function  guardarParam_Docs(Request $request)
    {

        $v =$this->validate(request(), [

            'nomb_param_docs' => 'required',
            'observ_param_docs' => 'required',
            'estado_param_docs' => 'required',
            'fechaini_param_docs' => 'required',
            'fechafin_param_docs' => 'required'
        ]);
        if ($v)
        {
            $param_docs= new Param_Docs();
            $param_docs->id_emp=$request->input('id_emp');
            $param_docs->id_fec=$request->input('id_fec');
            $param_docs->nomb_param_docs=$request->input('nomb_param_docs');
            $param_docs->observ_param_docs=$request->input('observ_param_docs');
            $param_docs->estado_param_docs=$request->input('estado_param_docs');
            $param_docs->fechaini_param_docs=$request->input('fechaini_param_docs');
            $param_docs->fechafin_param_docs=$request->input('fechafin_param_docs');
            $param_docs->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Param_Docs
    public function  modificarParam_Docs(Request $request,$id)
    {

       $v =$this->validate(request(), [

            'nomb_param_docs' => 'required',
            'observ_param_docs' => 'required',
            'estado_param_docs' => 'required',
            'fechaini_param_docs' => 'required',
            'fechafin_param_docs' => 'required'
        ]);
        if ($v)
        {
            $id_emp=$request->input('id_emp');
            $id_fec=$request->input('id_fec');
            $nomb_param_docs=$request->input('nomb_param_docs');
            $observ_param_docs=$request->input('observ_param_docs');
            $estado_param_docs=$request->input('estado_param_docs');
            $fechaini_param_docs=$request->input('fechaini_param_docs');
            $fechafin_param_docs=$request->input('fechafin_param_docs');
            DB::table('param_docs')
            ->where('id_param_docs', $id)
            ->update(['nomb_param_docs' => $nomb_param_docs, 'observ_param_docs' => $observ_param_docs , 'estado_param_docs' => $estado_param_docs, 'fechaini_param_docs' => $fechaini_param_docs,'fechafin_param_docs'=> $fechafin_param_docs,'id_emp'=> $id_emp,'id_fec'=> $id_fec]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarParamDOcs
    public function  eliminarParam_Docs($id)
    {
        $estado_param_docs= 'I';
        DB::table('param_docs')
            ->where('id_param_docs', $id)
            ->update(['estado_param_docs' => $estado_param_docs]
          );
        return;
    }


     public function getParam_Docs()
    {
      $param_docs = DB::table('param_docs as p')
      ->join('empresa', 'p.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'p.id_fec', '=', 'fecha_periodo.id_fec')
      ->orderBy("p.id_param_docs","desc")
      ->get();
      return $param_docs;
    }

}
