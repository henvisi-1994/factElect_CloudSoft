<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UnidadController extends Controller
{
    public function Unidad ()
    {
      return view('admin.Unidad.index');
    }
    public function getUnidad()
    {
        $unidades = Unidad::get();
        return $unidades;
    }
    public function CargarUnidad()
    {

        return view('admin.Unidad.Crear');
    }
     //Guardar Unidad
     public function  guardarUnidad(Request $request)
     {
         $v =$this->validate(request(), [

             'nomb_unidad' => 'required',
             'observ_unidad' => 'required',
             'estado_unidad' => 'required',
             'fechaini_unidad' => 'required',
             'fechafin_unidad' => 'required'
         ]);
         if ($v)
         {
           $unidad= new Unidad();
           $unidad->id_unidad=$request->input('id_unidad');
           $unidad->nomb_unidad=$request->input('nomb_unidad');
           $unidad->observ_unidad=$request->input('observ_unidad');
           $unidad->estado_unidad=$request->input('estado_unidad');
           $unidad->fechaini_unidad=$request->input('fechaini_unidad');
           $unidad->fechafin_unidad=$request->input('fechafin_unidad');
           $unidad->save();
           return redirect('Compras');
         }
         else
         {
           return back()->withInput($request->all());
         }
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
         return;
     }
         //Eliminar Unidad
     public function  eliminarUnidad($id)
     {
         $estado_unidad= 'I';
         DB::table('unidad')
             ->where('id_unidad', $id)
             ->update(['estado_unidad' => $estado_unidad]
           );
         return;
     }

}
