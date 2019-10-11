<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iva;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class IvaController extends Controller
{
    public function ivaActual()
    {
      //$iva= DB::select('select porcentaje_iva from iva WHERE (select YEAR (fecha_fin_iva)AS ano) >= YEAR(NOW())');
      $iva = Iva::whereYear('fecha_fin_iva', '>=', date('Y'))->get();
      return $iva;
    }
}
