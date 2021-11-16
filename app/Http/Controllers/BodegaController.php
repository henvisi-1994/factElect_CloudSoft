<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bodega;
use App\Ciudad;
use App\Fecha_periodo;
use App\Provincia;
use App\Pais;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Empresa;

class BodegaController extends Controller
{
    //// Metodos Bodega

    public function Bodega()
    {
        $bodegas = Bodega::get();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $paises = Pais::get();
        $provincias = Provincia::get();
        $ciudades = Ciudad::get();
        return view('admin.Bodega.index', compact('bodegas', 'empresas', 'fechas', 'paises', 'provincias', 'ciudades'));
    }
    public function CargarBodega()
    {

        return view('admin.Bodega.Crear');
    }
    //Guardar Bodega
    public function  guardarBodega(Request $request)
    {

        $v = $this->validate(request(), [

            'nombre_bod' => 'required',
            'direcc_bod' => 'required',
            'telef_bod' => 'required',
            'cel_bod' => 'required',
            'estado_bod' => 'required',
            'nomb_contac_bod' => 'required',
            'fechaini_bod' => 'required',
            'fechafin_bod' => 'required'
        ]);
        if ($v) {
            $bodegas = new Bodega();
            $bodegas->id_ciu = $request->input('id_ciu');
            $bodegas->id_pais = $request->input('id_pais');
            $bodegas->id_prov = $request->input('id_prov');
            $bodegas->nombre_bod = $request->input('nombre_bod');
            $bodegas->direcc_bod = $request->input('direcc_bod');
            $bodegas->telef_bod = $request->input('telef_bod');
            $bodegas->cel_bod = $request->input('cel_bod');
            $bodegas->estado_bod = $request->input('estado_bod');
            $bodegas->nomb_contac_bod = $request->input('nomb_contac_bod');
            $bodegas->fechaini_bod = $request->input('fechaini_bod');
            $bodegas->fechafin_bod = $request->input('fechafin_bod');
            $bodegas->save();
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    //Modificar Bodega
    public function  modificarBodega(Request $request, $id)
    {

        $v = $this->validate(request(), [

            'nombre_bod' => 'required',
            'direcc_bod' => 'required',
            'telef_bod' => 'required',
            'cel_bod' => 'required',
            'estado_bod' => 'required',
            'nomb_contac_bod' => 'required',
            'fechaini_bod' => 'required',
            'fechafin_bod' => 'required'
        ]);
        if ($v) {
            $id_ciu = $request->input('id_ciu');
            $id_pais = $request->input('id_pais');
            $id_prov = $request->input('id_prov');
            $nombre_bod = $request->input('nombre_bod');
            $direcc_bod = $request->input('direcc_bod');
            $telef_bod = $request->input('telef_bod');
            $cel_bod = $request->input('cel_bod');
            $estado_bod = $request->input('estado_bod');
            $nomb_contac_bod = $request->input('nomb_contac_bod');
            $fechaini_bod = $request->input('fechaini_bod');
            $fechafin_bod = $request->input('fechafin_bod');
            DB::table('bodega')
                ->where('id_bod', $id)
                ->update(
                    ['nombre_bod' => $nombre_bod, 'direcc_bod' => $direcc_bod, 'telef_bod' => $telef_bod, 'cel_bod' => $cel_bod, 'estado_bod' => $estado_bod, 'nomb_contac_bod' => $nomb_contac_bod, 'fechaini_bod' => $fechaini_bod, 'fechafin_bod' => $fechafin_bod, 'id_ciu' => $id_ciu, 'id_pais' => $id_pais, 'id_prov' => $id_prov]
                );
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    //EliminarBodega
    public function  eliminarBodega($id)
    {
        $estado_bod = 'I';
        DB::table('bodega')
            ->where('id_bod', $id)
            ->update(
                ['estado_bod' => $estado_bod]
            );
        return;
    }


    public function getBodega()
    {
        $bodegas = DB::table('bodega as b')
            ->join('pais', 'b.id_pais', '=', 'pais.id_pais')
            ->join('provincia', 'b.id_prov', '=', 'provincia.id_prov')
            ->join('ciudad', 'b.id_ciu', '=', 'ciudad.id_ciu')
            ->orderBy("b.id_bod", "desc")
            ->get();
        return $bodegas;
    }
}
