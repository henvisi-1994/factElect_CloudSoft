<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class MarcaController extends Controller
{
    public function Marca()
    {
        return view('admin.Marca.index');
    }
    public function getMarca()
    {
        $marcas = Marca::get();
        return $marcas;
    }
    public function CargarMarca()
    {

        return view('admin.Marca.Crear');
    }
    //Guardar Marca
    public function  guardarMarca(Request $request)
    {

        $v = $this->validate(request(), [

            'nomb_marca' => 'required',
            'observ_marca' => 'required',
            'estado_marca' => 'required',
            'fechaini_marca' => 'required',
            'fechafin_marca' => 'required'
        ]);
        if ($v) {
            $marca = new Marca();
            $marca->id_marca = $request->input('id_marca');
            $marca->nomb_marca = $request->input('nomb_marca');
            $marca->observ_marca = $request->input('observ_marca');
            $marca->estado_marca = $request->input('estado_marca');
            $marca->fechaini_marca = $request->input('fechaini_marca');
            $marca->fechafin_marca = $request->input('fechafin_marca');
            $marca->save();
            return response()->json([
                'mensaje' => "Registro de Marca Exitoso"
            ]);
        } else {
            return back()->withInput($request->all());
        }
    }

    //Modificar Marca
    public function  modificarMarca(Request $request, $id)
    {
        $nomb_marca = $request->input('nomb_marca');
        $estado_marca = $request->input('estado_marca');
        $fechaini_marca = $request->input('fechaini_marca');
        $fechafin_marca = $request->input('fechafin_marca');
        $observ_marca = $request->input('observ_marca');
        DB::table('marca')
            ->where('id_marca', $id)
            ->update(
                ['nomb_marca' => $nomb_marca, 'estado_marca' => $estado_marca, 'fechaini_marca' => $fechaini_marca, 'fechafin_marca' => $fechafin_marca, 'observ_marca' => $observ_marca]
            );
        return;
    }
    //Eliminar Marca
    public function  eliminarMarca($id)
    {
        $estado_marca = 'I';
        DB::table('marca')
            ->where('id_marca', $id)
            ->update(
                ['estado_marca' => $estado_marca]
            );
        return;
    }
}
