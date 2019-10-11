<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identificaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class IdentificacionesController extends Controller
{
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

        $v =$this->validate(request(), [

            'sri_ident' => 'required',
            'descrip_ident' => 'required',
            'observ_ident' => 'required',
            'estado_ident' => 'required'
        ]);
        if ($v)
        {
            $identificacion= new Identificaciones();
            $identificacion->id_ident=$request->input('id_ident');
            $identificacion->sri_ident=$request->input('sri_ident');
            $identificacion->descrip_ident=$request->input('descrip_ident');
            $identificacion->observ_ident=$request->input('observ_ident');
            $identificacion->estado_ident=$request->input('estado_ident');
            $identificacion->fechaini_ident=$request->input('fechaini_ident');
            $identificacion->fechafin_ident=$request->input('fechafin_ident');
            $identificacion->save();
          return ;
        }
        else
        {
          return back()->withInput($request->all());
        }
    }
    //Modificar Tipo Identificacion
    public function  modificarIdentificacion(Request $request,$id)
    {
      $v =$this->validate(request(), [

            'sri_ident' => 'required',
            'descrip_ident' => 'required',
            'observ_ident' => 'required',
            'estado_ident' => 'required'
        ]);
        if ($v)
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
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }

    }
    public function  eliminarIdentificacion($id)
    {
        $estado_ident= 'I';
        DB::table('identificacion')
            ->where('id_ident', $id)
            ->update(['estado_ident' => $estado_ident]
          );
        return;
    }
    public function getIdentificacion()
    {
        $identificacion = Identificaciones::get();
        return $identificacion;

    }
}
