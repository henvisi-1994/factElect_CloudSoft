<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RolesController extends Controller
{
     //Roles
     public function getRoles()
     {
       $roles = DB::table('roles as r')
       ->join('empresa','r.id_emp','=','empresa.id_emp')
       ->join('fecha_periodo','r.id_fec','=','fecha_periodo.id_fec')
       ->orderBy("r.id_rol","des")
       ->get();
       return $roles;
     }
      public function guardarRol(Request $request)
     {
       $v= $this->validate(request(),[
             'nomb_rol' => 'required|string'
         ]);
        if($v)
       {
         $roles= new Roles();
         $roles->create($request->all());
        return ;
           }
           else
       {
         return back()->withInput($request->all());
       }
     }
     public function modificarRol(Request $request,$id)
     {
         $v= $this->validate(request(),[
             'nomb_rol' => 'required|string'
         ]);
        if($v)
       {
         $id_emp  =  $request->input('id_emp');
         $id_fec  =  $request->input('id_fec');
         $nomb_rol  =  $request->input('nomb_rol');
         $observ_rol  =  $request->input('observ_rol');
         $estado_rol  =  $request->input('estado_rol');
         $fechaini_rol  =  $request->input('fechaini_rol');
         $fechafin_rol  =  $request->input('fechafin_rol');

         DB::table('roles')
             ->where('id_rol', $id)
             ->update(  ['id_emp' => $id_emp,'id_fec' => $id_fec,'nomb_rol' => $nomb_rol,'observ_rol' => $observ_rol ,
   'estado_rol' => $estado_rol ,'fechaini_rol' => $fechaini_rol,'fechafin_rol' => $fechafin_rol]
           );
          return ;
           }
           else
       {
         return back()->withInput($request->all());
       }
     }
       public function eliminarRol($id)
     {
         $estado_rol='I';
         DB::table('roles')
             ->where('id_rol', $id)
             ->update(['estado_rol' => $estado_rol]
           );
         return;
     }
}
