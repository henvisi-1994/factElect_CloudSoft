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
        return ;
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
