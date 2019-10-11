<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PaisController extends Controller
{
    //// Metodos Pais

    public function Pais()
    {
        $paises = Pais::get();
        return view('admin.Pais.index',compact('paises'));
    }
    public function CargarPais()
    {

        return view('admin.Pais.Crear');
    }
        //Guardar Pais
     public function  guardarPais(Request $request)
    {

        $v =$this->validate(request(), [

            'nomb_pais' => 'required',
            'estado_pais' => 'required'

        ]);
        if ($v)
        {
            $paises= new Pais();
            $paises->nomb_pais=$request->input('nomb_pais');
            $paises->estado_pais=$request->input('estado_pais');
            $paises->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Pais
    public function  modificarPais(Request $request,$id)
    {

       $v =$this->validate(request(), [

            'nomb_pais' => 'required',
            'estado_pais' => 'required'
        ]);
        if ($v)
        {
            $nomb_pais=$request->input('nomb_pais');
            $estado_pais=$request->input('estado_pais');
            DB::table('pais')
            ->where('id_pais', $id)
            ->update(['nomb_pais' => $nomb_pais, 'estado_pais'=> $estado_pais]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarPais
    public function  eliminarPais($id)
    {
        $estado_pais= 'I';
        DB::table('pais')
            ->where('id_pais', $id)
            ->update(['estado_pais' => $estado_pais]
          );
        return;
    }


     public function getPais()
    {
        $paises = Pais::get();
        return $paises;
    }

}
