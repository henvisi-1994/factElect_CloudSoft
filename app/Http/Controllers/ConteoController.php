<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ConteoController extends Controller
{
    public function conteo_usuarios(){
        $conteo_u = DB::select('SELECT COUNT(*) as total_usuario FROM usuario')[0]->total_usuario;
        return $conteo_u;
    }
        public function conteo_total_compras($id_usu){
        $id_usuario=$id_usu;
        $id_empl = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
        //return $id_empl;
        $conteo_total_compras = DB::select('SELECT SUM(total_fact) AS compras from factura
        LEFT JOIN empleado ON factura.id_empl=empleado.id_empleado LEFT JOIN empresa ON empleado.id_emp=empresa.id_emp
		  WHERE tipo_fact="Compra" AND empresa.id_emp=(SELECT id_emp FROM empleado WHERE id_empleado=?)',[$id_empl])[0]->compras;

       return $conteo_total_compras;
    }
        public function conteo_total_ventas($id_usu){
        $id_usuario=$id_usu;
        $id_empl = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
        $conteo_total_ventas = DB::select('SELECT SUM(total_fact) AS ventas from factura
        LEFT JOIN empleado ON factura.id_empl=empleado.id_empleado LEFT JOIN empresa ON empleado.id_emp=empresa.id_emp
		  WHERE tipo_fact="Venta" AND empresa.id_emp=(SELECT id_emp FROM empleado WHERE id_empleado=?)',[$id_empl])[0]->ventas;
        return $conteo_total_ventas;
    }


}