<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProvinciaController extends Controller
{
    //// Metodos Provincia

    public function Provincia()
    {
        $provincias = Provincia::get();
        return view('admin.Provincia.index',compact('provincias'));
    }
    public function CargarProvincia()
    {

        return view('admin.Provincia.Crear');
    }
        //Guardar Provincia
     public function  guardarProvincia(Request $request)
    {

         $v =$this->validate(request(), [

            'nomb_prov' => 'required',
            'estado_prov' => 'required'

        ]);
        if ($v)
        {
            $provincias= new Provincia();
            $provincias->id_pais=$request->input('id_pais');
            $provincias->nomb_prov=$request->input('nomb_prov');
            $provincias->estado_prov=$request->input('estado_prov');
            $provincias->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Provincia
    public function  modificarProvincia(Request $request,$id)
    {

       $v =$this->validate(request(), [

            'nomb_prov' => 'required',
            'estado_prov' => 'required'
        ]);
        if ($v)
        {
            $id_pais=$request->input('id_pais');
            $nomb_prov=$request->input('nomb_prov');
            $estado_prov=$request->input('estado_prov');
            DB::table('provincia')
            ->where('id_prov', $id)
            ->update(['nomb_prov' => $nomb_prov, 'estado_prov' => $estado_prov,'id_pais'=> $id_pais]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarProvincia
    public function  eliminarProvincia($id)
    {
        $estado_prov= 'I';
        DB::table('provincia')
            ->where('id_prov', $id)
            ->update(['estado_prov' => $estado_prov]
          );
        return;
    }


     public function getProvincia()
    {
      $provincias = DB::table('provincia as p')
      ->join('pais', 'p.id_pais', '=', 'pais.id_pais')
      ->orderBy("p.id_prov","desc")
      ->get();
      return $provincias;
    }
}
