<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
     /////////////////////////////
    //// Metodos Cliente

    public function Cliente()
    {
        $clientes = Cliente::get();
        return view('admin.Cliente.index',compact('clientes'));
    }
    public function CargarCliente()
    {

        return view('admin.Cliente.Crear');
    }
        //Guardar Cliente
     public function  guardarCliente(Request $request)
    {

        $v =$this->validate(request(), [

            'cod_cli' => 'required',
            'observ_cli' => 'required',
            'estado_cli' => 'required',
            'fechaini_cli' => 'required',
            'fechafin_cli' => 'required'
        ]);
        if ($v)
        {
            $clientes= new Cliente();
            $clientes->id_emp=$request->input('id_emp');
            $clientes->id_fec=$request->input('id_fec');
            $clientes->id_per=$request->input('id_per');
            $clientes->cod_cli=$request->input('cod_cli');
            $clientes->observ_cli=$request->input('observ_cli');
            $clientes->estado_cli=$request->input('estado_cli');
            $clientes->fechaini_cli=$request->input('fechaini_cli');
            $clientes->fechafin_cli=$request->input('fechafin_cli');
            $clientes->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Cliente
    public function  modificarCliente(Request $request,$id)
    {

       $v =$this->validate(request(), [

           'cod_cli' => 'required',
            'observ_cli' => 'required',
            'estado_cli' => 'required',
            'fechaini_cli' => 'required',
            'fechafin_cli' => 'required'
        ]);
        if ($v)
        {
            $id_emp=$request->input('id_emp');
            $id_fec=$request->input('id_fec');
            $id_per=$request->input('id_per');
            $cod_cli=$request->input('cod_cli');
            $observ_cli=$request->input('observ_cli');
            $estado_cli=$request->input('estado_cli');
            $fechaini_cli=$request->input('fechaini_cli');
            $fechafin_cli=$request->input('fechafin_cli');

            DB::table('cliente')
            ->where('id_cli', $id)
            ->update(['cod_cli' => $cod_cli, 'observ_cli' => $observ_cli , 'estado_cli' => $estado_cli, 'fechaini_cli' => $fechaini_cli,'fechafin_cli'=> $fechafin_cli,'id_emp'=> $id_emp,'id_fec'=> $id_fec,'id_per'=>$id_per]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarCliente
    public function  eliminarCliente($id)
    {
        $estado_cli= 'I';
        DB::table('cliente')
            ->where('id_cli', $id)
            ->update(['estado_cli' => $estado_cli]
          );
        return;
    }


     public function getCliente()
    {
      $clientes = DB::table('cliente as c')
      ->join('empresa', 'c.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'c.id_fec', '=', 'fecha_periodo.id_fec')
      ->join('persona', 'c.id_per', '=', 'persona.id_per')
      ->orderBy("c.id_cli","desc")
      ->get();
      return $clientes;
    }

}
