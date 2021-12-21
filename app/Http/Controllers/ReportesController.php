<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{
        public function reporte_ventas(){
            $id_usuario=Auth::user()->id_usu;
        $id_empl = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
         $ventas = DB::select('        SELECT DATE_FORMAT(fecha_emision_fact,"%Y-%m") AS mes, SUM(total_fact) AS ventas, empleado.id_emp,empresa.razon_emp from factura
        LEFT JOIN empleado ON factura.id_empl=empleado.id_empleado LEFT JOIN empresa ON empleado.id_emp=empresa.id_emp
		  WHERE tipo_fact="Venta" AND empresa.id_emp=(SELECT id_emp FROM empleado WHERE id_empleado=?)GROUP BY
        DATE_FORMAT(fecha_emision_fact,"%Y-%m"),empleado.id_empleado',[$id_empl]);
             return $ventas;
    }
        public function reporte_compras(){
        $id_usuario=Auth::user()->id_usu;
        $id_empl = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
         $compras = DB::select('SELECT DATE_FORMAT(fecha_emision_fact,"%Y-%m") AS mes, SUM(total_fact) AS compras, empleado.id_emp,empresa.razon_emp  from factura
        LEFT JOIN empleado ON factura.id_empl=empleado.id_empleado LEFT JOIN empresa ON empleado.id_emp=empresa.id_emp
		  WHERE tipo_fact="Compra" AND empresa.id_emp=(SELECT id_emp FROM empleado WHERE id_empleado=?) GROUP BY
        DATE_FORMAT(fecha_emision_fact,"%Y-%m"),empleado.id_empleado',[$id_empl]);
             return $compras;
    }

    public function index()
    {
    return view('Reportes.rcompras');
    }
    public function index_venta()
    {
    return view('Reportes.rventas');
    }


    public function download_rCompra($mes)
    {
        $id_usuario=Auth::user()->id_usu;
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
         $nom_usuario=Auth::user()->nomb_usu;
        $id_empl = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
         $compras = DB::select('SELECT DATE_FORMAT(fecha_emision_fact,"%Y-%m") AS mes, SUM(total_fact) AS compras, empleado.id_emp,empresa.razon_emp  from factura
        LEFT JOIN empleado ON factura.id_empl=empleado.id_empleado LEFT JOIN empresa ON empleado.id_emp=empresa.id_emp
		  WHERE tipo_fact="Compra" AND empresa.id_emp=(SELECT id_emp FROM empleado WHERE id_empleado=?)AND DATE_FORMAT(fecha_emision_fact,"%Y-%m")=? GROUP BY
        DATE_FORMAT(fecha_emision_fact,"%Y-%m"),empleado.id_empleado',[$id_empl,$mes]);
         $nombre_archivo=$date.$nom_usuario.".pdf";
    $data = [
        'compras'=>$compras,
    ];

    $pdf = PDF::loadView('Reportes.pdf_compra', $data);

    return $pdf->download($nombre_archivo);
    }

    public function download_rVentas($mes)
    {
        $id_usuario=Auth::user()->id_usu;
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
         $nom_usuario=Auth::user()->nomb_usu;
        $id_empl = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
         $ventas = DB::select('SELECT DATE_FORMAT(fecha_emision_fact,"%Y-%m") AS mes, SUM(total_fact) AS ventas, empleado.id_emp,empresa.razon_emp from factura
        LEFT JOIN empleado ON factura.id_empl=empleado.id_empleado LEFT JOIN empresa ON empleado.id_emp=empresa.id_emp
		  WHERE tipo_fact="Venta" AND empresa.id_emp=(SELECT id_emp FROM empleado WHERE id_empleado=?) AND DATE_FORMAT(fecha_emision_fact,"%Y-%m")= ? GROUP BY
        DATE_FORMAT(fecha_emision_fact,"%Y-%m"),empleado.id_empleado',[$id_empl,$mes]);
         $nombre_archivo=$date.$nom_usuario.".pdf";
    $data = [
        'ventas'=>$ventas,
    ];

    $pdf = PDF::loadView('Reportes.pdf_venta', $data);

    return $pdf->download($nombre_archivo);
    }
    //
}