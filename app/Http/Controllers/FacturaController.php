<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Fecha_periodo;
use App\FormaPago;
use App\Marca;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class FacturaController extends Controller
{
    public function  getFacturaCompra()
    {
       $facturas = DB::table('factura as fac')
       ->join('formapago','fac.id_formapago','=','formapago.id_formapago')
      ->join('persona','fac.id_per','=','persona.id_per')
      ->where('tipo_fact','=','Compra')
      ->orderBy("fac.id_fact","des")
      ->get();
      return $facturas;
    }
    public function guardarFacturaVenta(Request $request)
    {
       $v= $this->validate(request(),[
            'num_fact' => ['required', 'string'],
            'id_formapago' => ['required'],
        ]);
       if($v)
      {
       $factura= new Factura();
        $factura->id_formapago=  $request->input('id_formapago');
        $factura->id_per=  $request->input('id_per');
        $factura->num_fact=  $request->input('num_fact');
        $factura->fecha_emision_fact=  $request->input('fecha_emision_fact');
        $factura->hora_emision_fact=  $request->input('hora_emision_fact');
        $factura->vencimiento_fact=  $request->input('vencimiento_fact');
        $factura->estado_fact=  $request->input('estado_fact');
        $factura->tipo_fact=  $request->input('tipo_fact');
        $factura->observ_fact=  $request->input('observ_fact');
        $factura->subtotal_fact=  $request->input('subtotal_fact');
        $factura->subcero_fact=  $request->input('subcero_fact');
        $factura->subiva_fact=  $request->input('subiva_fact');
        $factura->subice_fact=  $request->input('subice_fact');
        $factura->total_fact=  $request->input('total_fact');
       $factura->save();
        return;
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
    public function  getFacturaVenta()
    {
       $facturas = DB::table('factura as fac')
       ->join('formapago','fac.id_formapago','=','formapago.id_formapago')
      ->join('persona','fac.id_per','=','persona.id_per')
      ->where('tipo_fact','=','Venta')
      ->orderBy("fac.id_fact","des")
      ->get();
      return $facturas;
    }
    public function  preguardarFacturaVenta(Request $request)
    {
      $id = $request->input('buscar_cli');
        $factura= DB::table('cliente as c')
         ->join('empresa', 'c.id_emp', '=', 'empresa.id_emp')
         ->join('fecha_periodo', 'c.id_fec', '=', 'fecha_periodo.id_fec')
         ->join('persona', 'c.id_per', '=', 'persona.id_per')
         ->where('persona.doc_per','=',$id)
        ->first();
         $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
            INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
            INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
          $marcas = Marca::get();
          $formas_pago = FormaPago::get();
        return view('admin.FacturaVenta.Detalle',compact('factura','categorias','marcas','formas_pago'));

    }
    public function ultimonumFactVenta()
    {
      $numFactVent=  Factura::select('num_fact')
      ->where('tipo_fact','=','Venta')
      ->latest()
      ->get();
      $num= substr($numFactVent,-13);
      $num= substr($num,0,-3);
      return $num;
    }


     public function getVentas()
    {
        $ventas = DB::table('factura')
                ->selectRaw('case month(fecha_emision_fact)
                WHEN 1 THEN "Enero"
                WHEN 2 THEN "Febrero"
                WHEN 3 THEN "Marzo"
                WHEN 4 THEN "Abril"
                WHEN 5 THEN "Mayo"
                WHEN 6 THEN "Junio"
                WHEN 7 THEN "Julio"
                WHEN 8 THEN "Agosto"
                WHEN 9 THEN "Septiembre"
                WHEN 10 THEN "Octubre"
                WHEN 11 THEN "Noviembre"
                WHEN 12 THEN "Diciembre"
                 END mes ,subtotal_fact ')
                ->whereRaw('year(fecha_emision_fact) = year(curdate()) and tipo_fact = "Venta"')
                ->groupBy('mes')
                ->orderByRaw('Month(fecha_emision_fact)ASC')
                ->get();
        return $ventas;
    }
    public function getCompras()
    {
        $ventas = DB::table('factura')
                ->selectRaw('case month(fecha_emision_fact)
                WHEN 1 THEN "Enero"
                WHEN 2 THEN "Febrero"
                WHEN 3 THEN "Marzo"
                WHEN 4 THEN "Abril"
                WHEN 5 THEN "Mayo"
                WHEN 6 THEN "Junio"
                WHEN 7 THEN "Julio"
                WHEN 8 THEN "Agosto"
                WHEN 9 THEN "Septiembre"
                WHEN 10 THEN "Octubre"
                WHEN 11 THEN "Noviembre"
                WHEN 12 THEN "Diciembre"
                 END mes ,subtotal_fact ')
                ->whereRaw('year(fecha_emision_fact) = year(curdate()) and tipo_fact = "Compra"')
                ->groupBy('mes')
                ->orderByRaw('Month(fecha_emision_fact)ASC')
                ->get();
        return $ventas;
    }
}
