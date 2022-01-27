<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KardexController extends Controller
{
     //Funcion Identificaciones
     public function kardex()
    {   $productos = DB::table('producto as prod')
            ->orderBy("prod.id_prod", "desc")
            ->get();
        return view('admin.Kardex.index',compact('productos'));
    }
    public function getKardex($id_prod,$fecha_inicio_k,$fecha_fin_k)
    {
        $kardex = DB::select('SELECT *FROM v_kardex WHERE id_prod='.$id_prod.' AND fecha_kardex BETWEEN "'.$fecha_inicio_k.'" AND "'.$fecha_fin_k.'"');
        return $kardex;
    }
    //
}