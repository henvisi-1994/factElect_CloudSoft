<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Persona;
use App\User;
use App\Empleado;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function CargarEmpleado()
    {
    $empresas = Empresa::get();
    $usuarios = User::get();
    $personas = Persona::get();
    return view('admin.Empleado.index',compact('empresas','usuarios','personas'));
    }
    public function getEmpleados()
    {
       $empleados = DB::select('SELECT *,nombre_per as nombre_empl,apel_per as apellido_empl
      FROM empleado INNER JOIN empresa ON empleado.id_emp=empresa.id_emp
      INNER JOIN usuario ON empleado.id_usu=usuario.id_usu
      INNER JOIN persona ON empleado.id_per=persona.id_per
      INNER JOIN roles ON usuario.id_rol=roles.id_rol');
       return $empleados;
    }
    public function guardarEmpleado(Request $request)
    {
        $v =$this->validate(request(), [

            'id_emp' => 'required',
            'id_per' => 'required',
            'id_usu' => 'required',
            //'estado_empl' => 'required'
        ]);
        if ($v)
        {
          $empleado = new Empleado();
           $empleado->create($request->all());
          return ;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     public function guardarUsuarioEmpleado(Request $request)
    {
        $v = $this->validate(request(), [
            'nomb_usu' => ['required', 'string', 'max:255'],
            'clave_usu' => ['required', 'string', 'min:6'],
        ]);
        if ($v) {
            $usuario = new User();
            $usuario->id_rol =  $request->input('id_rol');
            $usuario->id_emp =  $request->input('id_emp');
            $usuario->id_fec =  $request->input('id_fec');
            $usuario->nomb_usu =  $request->input('nomb_usu');
            $usuario->password =  Hash::make($request->input('clave_usu'));
            $usuario->observ_usu =  $request->input('observ_usu');
            $usuario->estado_usu =  $request->input('estado_usu');
            $usuario->email =  $request->input('email');
            $usuario->fechaini_usu =  $request->input('fechaini_usu');
            $usuario->fechafin_usu =  $request->input('fechafin_usu');
            $usuario->save();
            $usuario_email =User::where('email',$usuario->email)->first();
            $id_usu=$usuario_email->id_usu;
            return $id_usu;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function modificarEmpleado(Request $request,$id)
    {
      $v =$this->validate(request(), [

            'id_emp' => 'required',
            'id_usu' => 'required',
            'id_per' => 'required',
            'estado_empl' => 'required',
        ]);
        if ($v)
        {
          $id_emp  =  $request->input('id_emp');
          $id_usu =  $request->input('id_usu');
          $id_per =  $request->input('id_per');
          $estado_empl =  $request->input('estado_empl');
           DB::table('empleado')
                ->where('id_empleado', $id)
                ->update(['id_emp' => $id_emp,'id_usu' => $id_usu,'id_per' => $id_per,'estado_empl' => $estado_empl]
              );
           return ;
           }
        else
        {
          return back()->withInput($request->all());
        }
    }
       public function eliminarEmpleado($id)
    {
          $estado_empl = 'I';
           DB::table('empleado')
                ->where('id_empleado', $id)
                ->update(['estado_empl' => $estado_empl]
              );
           return;

    }
    public function ultimo_usuario(){
        $id_usu=DB::select('SELECT id_usu FROM usuario ORDER BY id_usu DESC LIMIT 1')[0]->id_usu;
        return $id_usu;
    }

    //
}