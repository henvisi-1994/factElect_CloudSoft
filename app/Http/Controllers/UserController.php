<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fecha_periodo;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Roles;
use App\Persona;
use App\TipoContribuyente;
use App\Identificaciones;
use App\Ciudad;

class UserController extends Controller
{
    public function Usuarios()
    {
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $roles = Roles::get();
        $personas = Persona::get();
        $usuarios = User::get();
        $tipoContribuyentes = TipoContribuyente::get();
        $identificaciones = Identificaciones::get();
        $ciudades = Ciudad::get();
        return view('admin.usuarios', compact('empresas', 'fechas', 'roles','personas','usuarios','tipoContribuyentes', 'identificaciones', 'ciudades'));
    }

    //Usuario
    public function getUsuario()
    {
        $periodo = DB::table('usuario as u')
            ->join('fecha_periodo', 'u.id_fec', '=', 'fecha_periodo.id_fec')
            ->join('empresa', 'u.id_emp', '=', 'empresa.id_emp')
            ->join('roles', 'u.id_rol', '=', 'roles.id_rol')
            ->orderBy("u.id_usu", "des")
            ->get();
        return $periodo;
    }
    public function guardarUsuario(Request $request)
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
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function modificarUsuario(Request $request, $id)
    {
        $v = $this->validate(request(), [
            'nomb_usu' => ['required', 'string', 'max:255'],
        ]);
        if ($v) {
            $id_rol  =  $request->input('id_rol');
            $id_emp = $request->input('id_emp');
            $id_fec = $request->input('id_fec');
            $nomb_usu  =  $request->input('nomb_usu');
            $observ_usu  =  $request->input('observ_usu');
            $estado_usu  =  $request->input('estado_usu');
            $fechaini_usu  =  $request->input('fechaini_usu');
            $fechafin_usu  =  $request->input('fechafin_usu');

            DB::table('usuario')
                ->where('id_usu', $id)
                ->update(
                    ['id_rol' => $id_rol, 'id_emp' => $id_emp, 'id_fec' => $id_fec, 'nomb_usu' => $nomb_usu, 'observ_usu' => $observ_usu, 'estado_usu' => $estado_usu, 'fechaini_usu' => $fechaini_usu, 'fechafin_usu' => $fechafin_usu]
                );
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function eliminarUsuario($id)
    {
        $estado_usu = 'I';
        DB::table('usuario')
            ->where('id_usu', $id)
            ->update(
                ['estado_usu' => $estado_usu]
            );
        return;
    }
}
