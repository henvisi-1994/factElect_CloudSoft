<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Fecha_periodo;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CiudadController extends Controller
{
    public function Ciudad()
    {
        $ciudades = DB::select('SELECT ciudad.id_ciu,ciudad.nomb_ciu,ciudad.estado_ciu,ciudad.fechaini_ciu,ciudad.fechafin_ciu,ciudad.observ_ciu,empresa.nombre_emp,fecha_periodo.nomb_fec,provincia.nomb_prov FROM ciudad
        INNER JOIN empresa ON ciudad.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON ciudad.id_fec = fecha_periodo.id_fec
        INNER JOIN provincia ON ciudad.id_prov=provincia.id_prov');
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        return view('admin.Ciudad.index', compact('ciudades', 'empresas', 'fechas'));
    }
    //Funcion de Cargar Ciudad
    public function CargarCiudad()
    {
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        return view('admin.Ciudad.Crear', compact('empresas', 'fechas'));
    }
    //Funcion Guardar Ciudad
    public function  guardarCiudad(Request $request)
    {
        $v = $this->validate(request(), [

            'nomb_ciu' => 'required',
            'id_emp' => 'required',
            'id_fec' => 'required',
            'estado_ciu' => 'required',
            'observ_ciu' => 'required',
            'id_prov' => 'required',
            'fechaini_ciu' => 'required',
            'fechafin_ciu' => 'required',

        ]);
        if ($v) {
            $ciudad = new Ciudad();
            $ciudad->nomb_ciu = $request->input('nomb_ciu');
            $ciudad->id_emp = $request->input('id_emp');
            $ciudad->id_fec = $request->input('id_fec');
            $ciudad->estado_ciu = $request->input('estado_ciu');
            $ciudad->observ_ciu = $request->input('observ_ciu');
            $ciudad->id_prov = $request->input('id_prov');
            $ciudad->fechaini_ciu = $request->input('fechaini_ciu');
            $ciudad->fechafin_ciu = $request->input('fechafin_ciu');
            $ciudad->save();
            return;
        } else {
            return back()->withInput($request->all());
        }
    }

    //Modificar Ciudad
    public function  modificarCiudad(Request $request, $id)
    {
        $id_emp =  $request->input('id_emp');
        $id_fec =  $request->input('id_fec');
        $nomb_ciu =  $request->input('nomb_ciu');
        $estado_ciu =  $request->input('estado_ciu');
        $fechaini_ciu =  $request->input('fechaini_ciu');
        $fechafin_ciu =  $request->input('fechafin_ciu');
        $observ_ciu =  $request->input('observ_ciu');
        DB::table('ciudad')
            ->where('id_ciu', $id)
            ->update(
                ['id_emp' => $id_emp, 'id_fec' => $id_fec, 'nomb_ciu' => $nomb_ciu, 'estado_ciu' => $estado_ciu, 'fechaini_ciu' => $fechaini_ciu, 'fechafin_ciu' => $fechafin_ciu, 'observ_ciu' => $observ_ciu]
            );
        return;
    }
    //EliminarCiudad
    public function  eliminarCiudad($id)
    {
        $estado_ciudad = 'I';
        DB::table('ciudad')
            ->where('id_ciu', $id)
            ->update(
                ['estado_ciu' => $estado_ciudad]
            );
        return;
    }

    public function getCiudad()
    {
        $ciudades =
            DB::select('SELECT ciudad.id_ciu,ciudad.nomb_ciu,ciudad.estado_ciu,ciudad.fechaini_ciu,ciudad.fechafin_ciu,ciudad.observ_ciu,empresa.nombre_emp,empresa.id_emp,fecha_periodo.nomb_fec,provincia.nomb_prov,provincia.id_prov,fecha_periodo.id_fec FROM ciudad
        INNER JOIN empresa ON ciudad.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON ciudad.id_fec = fecha_periodo.id_fec
        INNER JOIN provincia ON ciudad.id_prov=provincia.id_prov');
        return $ciudades;
    }
}
