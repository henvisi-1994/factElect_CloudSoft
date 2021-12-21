<?php

namespace App\Http\Controllers;

use App\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class InventarioController extends Controller
{
    //Funcion Identificaciones
    /* public function Inventario()
    {
        $inventarios = Inventario::get();
        return view('admin.Inventario.index',compact('inventarios'));
    }*/

        //Guardar Identificacion
     public function  guardarInventario(Request $request)
    {
        $v =$this->validate(request(), [
            'id_usu' => 'required',
            'id_emp' => 'required',
            'id_fec' => 'required',
            'descrpcion_inv' => 'required',
            'fecha_inv' => 'required',
            'numprod_inv' => 'required',
            'numexist_inv' => 'required',
            'observ_inv' => 'required',
            'estado_inv' => 'required',
            'numexist_inv' => 'required',
            'fechaini_inv' => 'required',
            'fechafin_inv' => 'required',
            'control_fecha' => 'required',
            'id_prod' => 'required',
        ]);
        if ($v)
        {
            $id_prod=$request->input('id_prod');
            $producto=DB::select('SELECT producto.id_bod,producto.descripcion_prod,producto.stockmax_prod,producto.precio_prod,producto.comision_prod
            FROM producto WHERE id_prod=?',[$id_prod])[0];
            $id_bod=$producto->id_bod;
            $id_usuario=Auth::user()->id_usu;
            $carbon = new \Carbon\Carbon();
            $date = $carbon->now();
            $cant_prod=$producto->stockmax_prod;
            $precio_prod=$producto->precio_prod;
            $cap_neto=$cant_prod*$precio_prod;
            $comision=$producto->comision_prod;
            $pvp=$precio_prod+($precio_prod*$comision);
            $utilidad=$pvp-$cap_neto;
            $inventarios= new Inventario();
            $inventarios->id_usu=$id_usuario;
            $inventarios->id_bod=$id_bod;
            $inventarios->id_emp=$request->input('id_emp');
            $inventarios->id_fec=$request->input('id_fec');
            $inventarios->descrpcion_inv=$request->input('descrpcion_inv');
            $inventarios->fecha_inv=$date;
            $inventarios->numprod_inv=$request->input('numprod_inv');
            $inventarios->numexist_inv=$request->input('numexist_inv');
            $inventarios->capneto_inv=$cap_neto;
            $inventarios->cappvp_inv=$pvp;
            $inventarios->util_inv=$utilidad;
            $inventarios->observ_inv=$request->input('observ_inv');
            $inventarios->estado_inv=$request->input('estado_inv');
            $inventarios->fechaini_inv=$date;
            $inventarios->fechafin_inv=$request->input('fechafin_inv');
            $inventarios->control_fecha=$date;
            $inventarios->save();
          return ;
        }
        else
        {
          return back()->withInput($request->all());
        }
    }
    //Modificar Tipo Identificacion
    public function  modificarIdentificacion(Request $request,$id)
    {
      $v =$this->validate(request(), [
            'id_usu' => 'required',
            'id_emp' => 'required',
            'id_fec' => 'required',
            'descrpcion_inv' => 'required',
            'fecha_inv' => 'required',
            'numprod_inv' => 'required',
            'numexist_inv' => 'required',
            'observ_inv' => 'required',
            'estado_inv' => 'required',
            'numexist_inv' => 'required',
            'fechaini_inv' => 'required',
            'fechafin_inv' => 'required',
            'control_fecha' => 'required',
            'id_prod' => 'required',
        ]);
        if ($v)
        {
            $id_prod=$request->input('id_prod');
            $producto=DB::select('SELECT producto.id_bod,producto.descripcion_prod,producto.stockmax_prod,producto.precio_prod,producto.comision_prod
            FROM producto WHERE id_prod=?',[$id_prod])[0];
            $id_bod=$producto->id_bod;
            $id_usuario=Auth::user()->id_usu;
            $carbon = new \Carbon\Carbon();
            $date = $carbon->now();
            $cant_prod=$producto->stockmax_prod;
            $precio_prod=$producto->precio_prod;
            $cap_neto=$cant_prod*$precio_prod;
            $comision=$producto->comision_prod;
            $pvp=$precio_prod+($precio_prod*$comision);
            $utilidad=$pvp-$cap_neto;
            $inventarios= new Inventario();
            $id_usu=$id_usuario;
            $id_bod=$id_bod;
            $id_emp=$request->input('id_emp');
            $id_fec=$request->input('id_fec');
            $descrpcion_inv=$request->input('descrpcion_inv');
            $fecha_inv=$date;
            $numprod_inv=$request->input('numprod_inv');
            $numexist_inv=$request->input('numexist_inv');
            $capneto_inv=$cap_neto;
            $cappvp_inv=$pvp;
            $util_inv=$utilidad;
            $observ_inv=$request->input('observ_inv');
            $estado_inv=$request->input('estado_inv');
            $fechaini_inv=$date;
            $fechafin_inv=$request->input('fechafin_inv');
            $control_fecha=$date;
            DB::table('inventario')
            ->where('id_inv', $id)
            ->update(['id_usu' => $id_usu, 'id_emp' => $id_emp , 'id_fec' => $id_fec,
            'descrpcion_inv' => $descrpcion_inv,'fecha_inv'=> $fecha_inv,'numprod_inv'=> $numprod_inv
            ,'numexist_inv'=> $numexist_inv,'capneto_inv'=> $capneto_inv,'cappvp_inv'=> $cappvp_inv
            ,'util_inv'=> $util_inv,'observ_inv'=> $observ_inv,'estado_inv'=> $estado_inv
            ,'fechaini_inv'=> $fechaini_inv,'fechafin_inv'=> $fechafin_inv,'control_fecha'=> $control_fecha]
          );
          return ;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
    public function  eliminarInventario($id)
    {
        $estado_inv= 'I';
        DB::table('inventario')
            ->where('id_inv', $id)
            ->update(['estado_inv' => $estado_inv]
          );
        return;
    }
    public function getInventario()
    {
        $inventarios=DB::select('SELECT *FROM v_inventario');
        return $inventarios;

    }
}
