<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Proveedor;
use App\Fecha_periodo;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class ProveedorController extends Controller
{
    public function getProveedor()
    {
       $proveedores = DB::table('proveedor as pro')
        ->join('empresa', 'pro.id_emp', '=', 'empresa.id_emp')
        ->join('fecha_periodo', 'pro.id_fec', '=', 'fecha_periodo.id_fec')
        ->join('persona','pro.id_per','=','persona.id_per')
        ->get();
       return $proveedores;
    }
    public function CargarProveedor()
    {
    $empresas = Empresa::get();
    $fechas = Fecha_periodo::get();
    $personas = Persona::get();
    return view('admin.Proveedor.Crear',compact('empresas','fechas','personas'));
    }

    public function guardarProveedor(Request $request)
    {
      $v =$this->validate(request(), [

            'id_emp' => 'required',
            'id_fec' => 'required',
            'cod_prov' => 'required',
            'id_per' => 'required',
            'estado_prov' => 'required'
        ]);
        if ($v)
        {
          $proveedor = new Proveedor;
           $proveedor->create($request->all());
          return ;
        }
        else
        {
          return back()->withInput($request->all());
        }


    }
    public function premodificarProveedor(Request $request,$id)
    {
        $proveedor = Proveedor::where('id_prov',$id)->first();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $personas= Persona::get();
        return view('admin.Proveedor.Modificar',compact('proveedor','empresas','fechas','personas'));
    }
    public function modificarProveedor(Request $request,$id)
    {
      $v =$this->validate(request(), [

            'id_emp' => 'required',
            'id_fec' => 'required',
            'cod_prov' => 'required',
            'id_per' => 'required',
            'estado_prov' => 'required'
        ]);
        if ($v)
        {
          $id_emp  =  $request->input('id_emp');
          $id_fec =  $request->input('id_fec');
          $cod_prov =  $request->input('cod_prov');
          $id_per =  $request->input('id_per');
          $obser_prov =  $request->input('obser_prov');
          $estado_prov =  $request->input('estado_prov');
          $fechaini_prov =  $request->input('fechaini_prov');
          $fechafin_prov =  $request->input('fechafin_prov');
           DB::table('proveedor')
                ->where('id_prov', $id)
                ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'cod_prov' => $cod_prov, 'id_per' => $id_per,'obser_prov' => $obser_prov ,'estado_prov' => $estado_prov, 'fechaini_prov' => $fechaini_prov, 'fechafin_prov' => $fechafin_prov]
              );
           return ;
           }
        else
        {
          return back()->withInput($request->all());
        }
    }
       public function eliminarProveedor($id)
    {
          $estado_prov = 'I';
           DB::table('proveedor')
                ->where('id_prov', $id)
                ->update(['estado_prov' => $estado_prov]
              );
           return;

    }
}
