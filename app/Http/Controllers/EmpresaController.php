<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Ciudad;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    public function Empresa()
    {
        $ciudades = Ciudad::get();
        return view('admin.Empresa.index', compact('ciudades'));
    }
    public function getEmpresa()
    {
        $empresas = DB::select('SELECT ciudad.id_ciu,ciudad.nomb_ciu,empresa.id_emp,empresa.totestab_emp,rucempresa_emp,razon_emp,nombre_emp,apellido_emp,contacto_emp
,direcc_emp,telefono_emp,celular_emp,fax_emp,email_emp,estado_emp,contador_emp,tipcontrib_emp,fechaini_emp,fechafin_emp FROM empresa
INNER JOIN ciudad ON ciudad.id_ciu=empresa.id_ciu');
        return $empresas;
    }
    public function guardarEmmpresa(Request $request)
    {
        $v = $this->validate(request(), [
            'rucempresa_emp' => 'required|numeric',
            'razon_emp' => 'required|string',
            'nombre_emp' => 'required|string',
            'apellido_emp' => 'required|string',
            'direcc_emp' => 'required',
            'telefono_emp' => 'required|numeric',
            'contador_emp' => 'required|string',
        ]);
        if ($v) {
            $empresa = new Empresa();
            $empresa->create($request->all());
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function modificarEmpresa(Request $request, $id)
    {
        $v = $this->validate(request(), [
            'rucempresa_emp' => 'required|numeric',
            'razon_emp' => 'required|string',
            'nombre_emp' => 'required|string',
            'apellido_emp' => 'required|string',
            'direcc_emp' => 'required',
            'telefono_emp' => 'required|numeric',
            'contador_emp' => 'required|string',
        ]);
        if ($v) {
            $id_ciu  =  $request->input('id_ciu');
            $totestab_emp  =  $request->input('totestab_emp');
            $rucempresa_emp  =  $request->input('rucempresa_emp');
            $razon_emp  =  $request->input('razon_emp');
            $nombre_emp  =  $request->input('nombre_emp');
            $apellido_emp  =  $request->input('apellido_emp');
            $contacto_emp  =  $request->input('contacto_emp');
            $direcc_emp  =  $request->input('direcc_emp');
            $telefono_emp  =  $request->input('telefono_emp');
            $celular_emp  =  $request->input('celular_emp');
            $fax_emp  =  $request->input('fax_emp');
            $email_emp  =  $request->input('email_emp');
            $estado_emp  =  $request->input('estado_emp');
            $contador_emp  =  $request->input('contador_emp');
            $tipcontrib_emp  =  $request->input('tipcontrib_emp');
            $fechaini_emp  =  $request->input('fechaini_emp');
            $fechafin_emp  =  $request->input('fechafin_emp');
            DB::table('empresa')
                ->where('id_emp', $id)
                ->update(
                    [
                        'id_ciu' => $id_ciu, 'totestab_emp' => $totestab_emp,
                        'rucempresa_emp' => $rucempresa_emp,
                        'razon_emp' => $razon_emp,
                        'nombre_emp' => $nombre_emp,
                        'apellido_emp' => $apellido_emp,
                        'contacto_emp' => $contacto_emp,
                        'direcc_emp' => $direcc_emp,
                        'telefono_emp' => $telefono_emp,
                        'celular_emp' => $celular_emp,
                        'fax_emp' => $fax_emp,
                        'email_emp'  => $email_emp,
                        'estado_emp' => $estado_emp,
                        'contador_emp' => $contador_emp,
                        'tipcontrib_emp' => $tipcontrib_emp,
                        'fechaini_emp' => $fechaini_emp,
                        'fechafin_emp' => $fechafin_emp,
                    ]
                );
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function eliminarEmpresa($id)
    {
        $estado_emp = 'I';
        DB::table('empresa')
            ->where('id_emp', $id)
            ->update(
                ['estado_emp' => $estado_emp]
            );
        return;
    }
}
