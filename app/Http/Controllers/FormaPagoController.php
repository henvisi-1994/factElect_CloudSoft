<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaPago;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class FormaPagoController extends Controller
{
    //forma de Pago
    public function getFormaPago()
    {
        $formapago = DB::table('formapago as fp')
            ->join('fecha_periodo', 'fp.id_fec', '=', 'fecha_periodo.id_fec')
            ->join('empresa', 'fp.id_emp', '=', 'empresa.id_emp')
            ->orderBy("fp.id_formapago", "des")
            ->get();
        return $formapago;
    }
    public function guardarFormaPago(Request $request)
    {
        $v = $this->validate(request(), [
            'nomb_formapago' => 'required|string'
        ]);
        if ($v) {
            $formulario = new FormaPago();
            $formulario->create($request->all());
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function modificarFormaPago(Request $request, $id)
    {
        $v = $this->validate(request(), [
            'nomb_formapago' => 'required|string'
        ]);
        if ($v) {
            $id_emp  =  $request->input('id_emp');
            $id_fec  =  $request->input('id_fec');
            $nomb_formapago  =  $request->input('nomb_formapago');
            $observ_formapago  =  $request->input('observ_formapago');
            $estado_formapago  =  $request->input('estado_formapago');
            $fechaini_formapago  =  $request->input('fechaini_formapago');
            $fechafin_formapago  =  $request->input('fechafin_formapago');

            DB::table('formapago')
                ->where('id_formapago', $id)
                ->update(
                    [
                        'id_emp' => $id_emp, 'nomb_formapago' => $nomb_formapago, 'observ_formapago' => $observ_formapago,
                        'estado_formapago' => $estado_formapago, 'fechaini_formapago' => $fechaini_formapago, 'fechafin_formapago' => $fechafin_formapago
                    ]
                );
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function eliminarFormaPago($id)
    {
        $estado_formapago = 'I';
        DB::table('formapago')
            ->where('id_formapago', $id)
            ->update(
                ['estado_formapago' => $estado_formapago]
            );
        return;
    }
}
