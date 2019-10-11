<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContribuyente;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TipoContribuyenteController extends Controller
{
    public function TipoContribuyente()
    {
        $tiposContribuyentes = TipoContribuyente::get();
        return view('admin.TipoContribuyente.index',compact('tiposContribuyentes'));
    }
    public function CargarTipoContribuyente()
    {

        return view('admin.TipoContribuyente.Crear');
    }
        //Guardar TipoContribuyente
     public function  guardarTipoContribuyente(Request $request)
    {

        $v =$this->validate(request(), [

            'nomb_contrib' => 'required',
            'obser_contrib' => 'required',
            'estado_contrib' => 'required',
            'fechaini_contrib' => 'required',
            'fechafin_contrib' => 'required'
        ]);
        if ($v)
        {
            $tiposContribuyentes= new TipoContribuyente();
            $tiposContribuyentes->nomb_contrib=$request->input('nomb_contrib');
            $tiposContribuyentes->obser_contrib=$request->input('obser_contrib');
            $tiposContribuyentes->estado_contrib=$request->input('estado_contrib');
            $tiposContribuyentes->fechaini_contrib=$request->input('fechaini_contrib');
            $tiposContribuyentes->fechafin_contrib=$request->input('fechafin_contrib');
            $tiposContribuyentes->save();
            return redirect('TipoContribuyente');
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Tipo Contribuyente
    public function  modificarTipoContribuyente(Request $request,$id)
    {

       $v =$this->validate(request(), [

            'nomb_contrib' => 'required',
            'obser_contrib' => 'required',
            'estado_contrib' => 'required',
            'fechaini_contrib' => 'required',
            'fechafin_contrib' => 'required'
        ]);
        if ($v)
        {
        $nomb_contrib= $request->input('nomb_contrib');
        $obser_contrib= $request->input('obser_contrib');
        $estado_contrib= $request->input('estado_contrib');
        $fechaini_contrib= $request->input('fechaini_contrib');
        $fechafin_contrib= $request->input('fechafin_contrib');
        DB::table('tip_contrib')
            ->where('id_contrib', $id)
            ->update(['nomb_contrib' => $nomb_contrib, 'obser_contrib' => $obser_contrib , 'estado_contrib' => $estado_contrib, 'fechaini_contrib' => $fechaini_contrib,'fechafin_contrib'=> $fechafin_contrib]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarTipoContribuyente
    public function  eliminarTipoContribuyente($id)
    {
        $estado_contrib= 'I';
        DB::table('tip_contrib')
            ->where('id_contrib', $id)
            ->update(['estado_contrib' => $estado_contrib]
          );
        return;
    }
    public function getTipoContribuyente()
    {
      $tiposContribuyentes = TipoContribuyente::get();
      return $tiposContribuyentes;
    }
}
