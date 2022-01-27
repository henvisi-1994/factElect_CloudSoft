<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleFactura;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DetalleFacturaController extends Controller
{
    public function guardarDetalleFacturaVenta(Request $request,$num_fact)
    {
       $idFactura = DB::table('factura as fac')
        ->select ('id_fact')
        ->where('num_fact','=',$num_fact)->first();
        $detalleFact = new DetalleFactura();
        $detalleFact->id_fact=$idFactura->id_fact;
        $detalleFact->id_prod=$request->input('id_prod');
        $detalleFact->cantidad=$request->input('cantidad');
        $detalleFact->descripcion=$request->input('descripcion');
        $detalleFact->precio_prod=$request->input('precio_prod');
        $detalleFact->descuento=$request->input('descuento');
        $detalleFact->neto=$request->input('neto');
        $detalleFact->iva= $request->input('iva');
        $detalleFact->total=$request->input('total');
        //$detalleFact->save();
        DB::table('detalle_factura')->insert(
        ['id_fact' => $detalleFact->id_fact, 'id_prod' => $detalleFact->id_prod,'cantidad'=>$detalleFact->cantidad,
        'descripcion'=>$detalleFact->descripcion,'precio_prod'=>$detalleFact->precio_prod,'descuento'=>$detalleFact->descuento,
        'neto'=>$detalleFact->neto,'iva'=>$detalleFact->iva,'total'=>$detalleFact->total]);
        $id_salida = DB::select('SELECT id_salida_kardex from salida_kardex order by id_salida_kardex  desc limit 1')[0]->id_salida_kardex;
        $prec_total_salida = DB::select('SELECT prec_total_salida from salida_kardex order by id_salida_kardex  desc limit 1')[0]->prec_total_salida;
        $id_entrada = DB::select('SELECT id_entrada from entrada_kardex order by id_entrada  desc limit 1')[0]->id_entrada;
        $id_kardex = DB::select('SELECT id_kardex from kardex order by id_kardex  desc limit 1')[0]->id_kardex;
        $cant_anterior  = DB::select('select cant_mov_kardex from movimiento_kardex where id_prod='.$detalleFact->id_prod.' order by `id_movimiento_kardex` desc limit 1')[0]->cant_mov_kardex;
        $costo_total_anterior   = DB::select('SELECT prec_total_movimiento from movimiento_kardex WHERE id_prod='.$detalleFact->id_prod.' order by `id_movimiento_kardex`  desc limit 1')[0]->prec_total_movimiento;
        DB::table('movimiento_kardex')->insert(
        ['cant_mov_kardex' => $cant_anterior-$detalleFact->cantidad, 'prec_uni_movimiento' => $detalleFact->precio_prod,'prec_total_movimiento'=>$costo_total_anterior-$prec_total_salida,
        'entrada_kardex_id_entrada'=>$id_entrada,'salida_kardex_id_salida_kardex'=>$id_salida,'id_prod' => $detalleFact->id_prod]);
        $id_movimiento_kardex = DB::select('SELECT id_movimiento_kardex from movimiento_kardex order by id_movimiento_kardex  desc limit 1')[0]->id_movimiento_kardex;
        DB::table('detalle_kardex')->insert(['id_kardex' => $id_kardex, 'id_movimiento' => $id_movimiento_kardex]);
        return;
    }
    public function guardarDetalleFacturaCompra(Request $request,$num_fact)
    {
       $idFactura = DB::table('factura as fac')
        ->select ('id_fact')
        ->where('num_fact','=',$num_fact)->first();
        $detalleFact = new DetalleFactura();
        $detalleFact->id_fact=$idFactura->id_fact;
        $detalleFact->id_prod=$request->input('id_prod');
        $detalleFact->cantidad=$request->input('cantidad');
        $detalleFact->descripcion=$request->input('descripcion');
        $detalleFact->precio_prod=$request->input('precio_prod');
        $detalleFact->descuento=$request->input('descuento');
        $detalleFact->neto=$request->input('neto');
        $detalleFact->iva= $request->input('iva');
        $detalleFact->total=$request->input('total');
        $detalleFact->save();
        return ;
    }
}