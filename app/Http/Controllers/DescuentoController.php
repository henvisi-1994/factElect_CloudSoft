<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descuento;
use App\Empresa;
use App\Fecha_periodo;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DescuentoController extends Controller
{
    /////////////////////////////
    //// Metodos Descuento

    public function Descuento ()
    {
      $empresas = Empresa::get();
      $fechas = Fecha_periodo::get();
    return view('admin.Descuento.index',compact('empresas','fechas'));
    }
    public function CargarDescuento()
    {

        return view('admin.Descuento.Crear');
    }
        //Guardar Descuento
     public function  guardarDescuento(Request $request)
    {

        $v =$this->validate(request(), [

            'nomb_desc' => 'required',
            'observ_desc' => 'required',
            'estado_desc' => 'required',
            'fechaini_desc' => 'required',
            'fechafin_desc' => 'required'
        ]);
        if ($v)
        {
            $descuentos= new Descuento();
            $descuentos->id_emp=$request->input('id_emp');
            $descuentos->id_fec=$request->input('id_fec');
            $descuentos->nomb_desc=$request->input('nomb_desc');
            $descuentos->observ_desc=$request->input('observ_desc');
            $descuentos->estado_desc=$request->input('estado_desc');
            $descuentos->fechaini_desc=$request->input('fechaini_desc');
            $descuentos->fechafin_desc=$request->input('fechafin_desc');
            $descuentos->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Descuento
    public function  modificarDescuento(Request $request,$id)
    {

       $v =$this->validate(request(), [

            'nomb_desc' => 'required',
            'observ_desc' => 'required',
            'estado_desc' => 'required',
            'fechaini_desc' => 'required',
            'fechafin_desc' => 'required'
        ]);
        if ($v)
        {
            $id_emp=$request->input('id_emp');
            $id_fec=$request->input('id_fec');
            $nomb_desc=$request->input('nomb_desc');
            $observ_desc=$request->input('observ_desc');
            $estado_desc=$request->input('estado_desc');
            $fechaini_desc=$request->input('fechaini_desc');
            $fechafin_desc=$request->input('fechafin_desc');
            DB::table('descuento')
            ->where('id_desc', $id)
            ->update(['nomb_desc' => $nomb_desc, 'observ_desc' => $observ_desc , 'estado_desc' => $estado_desc, 'fechaini_desc' => $fechaini_desc,'fechafin_desc'=> $fechafin_desc,'id_emp'=> $id_emp,'id_fec'=> $id_fec]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarDescuento
    public function  eliminarDescuento($id)
    {
        $estado_desc= 'I';
        DB::table('descuento')
            ->where('id_desc', $id)
            ->update(['estado_desc' => $estado_desc]
          );
        return;
    }


     public function getDescuento()
    {
      $descuentos = DB::table('descuento as d')
      ->join('empresa', 'd.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'd.id_fec', '=', 'fecha_periodo.id_fec')
      ->orderBy("d.id_desc","desc")
      ->get();
      return $descuentos;
    }
}
