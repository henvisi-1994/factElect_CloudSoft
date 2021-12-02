<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Ciudad;
use App\Fecha_periodo;
use App\TipoContribuyente;
use App\Identificaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PersonaController extends Controller
{
    //Persona
  public function Persona()
  {
    $persona = DB::select('SELECT persona.id_per,persona.doc_per,persona.organiz_per,persona.nombre_per,persona.apel_per,persona.direc_per,persona.fono1_per,persona.fono2_per,persona.cel1_per,
persona.cel2_per,persona.fecnac_per,persona.correo_per,persona.estado_per,persona.fechaini_per,persona.fechafin_per,tip_contrib.nomb_contrib,ciudad.nomb_ciu,identificacion.sri_ident
 FROM persona
      INNER JOIN tip_contrib ON persona.id_contrib= tip_contrib.id_contrib
      INNER JOIN ciudad ON persona.id_ciu = ciudad.id_ciu
      INNER JOIN identificacion ON persona.id_ident = identificacion.id_ident');
      return view('admin.Persona.index',compact('persona'));
  }
  public function PersonaSA(){
      $persona = DB::select('SELECT persona.id_per,persona.doc_per,persona.organiz_per,persona.nombre_per,persona.apel_per,persona.direc_per,persona.fono1_per,persona.fono2_per,persona.cel1_per,
persona.cel2_per,persona.fecnac_per,persona.correo_per,persona.estado_per,persona.fechaini_per,persona.fechafin_per,tip_contrib.nomb_contrib,ciudad.nomb_ciu,identificacion.sri_ident
 FROM persona
      INNER JOIN tip_contrib ON persona.id_contrib= tip_contrib.id_contrib
      INNER JOIN ciudad ON persona.id_ciu = ciudad.id_ciu
      INNER JOIN identificacion ON persona.id_ident = identificacion.id_ident WHERE persona.apel_per IS NULL');
      return $persona;
  }
  //Funcion de Cargar Persona
   public function CargarPersona()
  {
    $tipoContribuyentes = TipoContribuyente::get();
    $ciudades = Ciudad::get();
    $identificaciones = Identificaciones::get();
    return view('admin.Persona.Proveedor',compact('tipoContribuyentes','ciudades','identificaciones'));
  }
    //Funcion Guardar Persona
    public function  guardarPersona(Request $request)
    {
           $v =$this->validate(request(), [

            'doc_per' => 'required | Numeric',
            'organiz_per' => 'required',
            'nombre_per' => 'required',
            'apel_per' => 'required',
            'direc_per' => 'required',
            'fecnac_per' => 'required',
            'estado_per' => 'required',
            'correo_per'    => 'required|email',
            'fono1_per' => 'required',
            'cel1_per' => 'required'
        ]);

        if ($v)
        {
        $persona = new Persona();
        $persona->id_contrib=$request->input('id_contrib');
        $persona->id_ident=$request->input('id_ident');
        $persona->id_ciu=$request->input('id_ciu');
        $persona->doc_per=$request->input('doc_per');
        $persona->organiz_per=$request->input('organiz_per');
        $persona->nombre_per=$request->input('nombre_per');
        $persona->apel_per=$request->input('apel_per');
        $persona->direc_per=$request->input('direc_per');
        $persona->fono1_per=$request->input('fono1_per');
        $persona->fono2_per=$request->input('fono2_per');
        $persona->cel1_per=$request->input('cel1_per');
        $persona->cel2_per=$request->input('cel2_per');
        $persona->fecnac_per=$request->input('fecnac_per');
        $persona->correo_per=$request->input('correo_per');
        $persona->estado_per=$request->input('estado_per');
        $persona->fechaini_per=$request->input('fechaini_per');
        $persona->fechafin_per=$request->input('fechafin_per');
        $persona->save();
        $persona_ced =Persona::where('doc_per',$persona->doc_per)->first();
        $id_per=$persona_ced->id_per;
        return $id_per;
      }
      else
        {
          return back()->withInput($request->all());
        }

    }
      //Pre modificar Persona
    public function  premodificarPersona(Request $request,$id)
    {
        $persona= Persona::where('id_per',$id)->first();
        $tipoContribuyentes= TipoContribuyente::get();
        $identificaciones = Identificaciones::get();
        $ciudades = Ciudad::get();
        return view('admin.Persona.Modificar',compact('persona','tipoContribuyentes','identificaciones','ciudades'));
    }
    //Modificar Persona
    public function  modificarPersona(Request $request,$id)
    {
       $v =$this->validate(request(), [

            'doc_per' => 'required | Numeric',
            'organiz_per' => 'required',
            'nombre_per' => 'required',
            'apel_per' => 'required',
            'direc_per' => 'required',
            'fecnac_per' => 'required',
            'estado_per' => 'required',
            'correo_per'    => 'required|email',
            'fono1_per' => 'required',
            'cel1_per' => 'required'
        ]);

        if ($v)
        {
        $id_contrib =  $request->input('id_contrib');
        $id_ident =  $request->input('id_ident');
        $id_ciu =  $request->input('id_ciu');
        $doc_per =  $request->input('doc_per');
        $organiz_per =  $request->input('organiz_per');
        $nombre_per =  $request->input('nombre_per');
        $apel_per =  $request->input('apel_per');
        $direc_per =  $request->input('direc_per');
        $fono1_per =  $request->input('fono1_per');
        $fono2_per =  $request->input('fono2_per');
        $cel1_per =  $request->input('cel1_per');
        $cel2_per =  $request->input('cel2_per');
        $fecnac_per =  $request->input('fecnac_per');
        $correo_per =  $request->input('correo_per');
        $estado_per =  $request->input('estado_per');
        $fechaini_per =  $request->input('fechaini_per');
        $fechafin_per =  $request->input('fechafin_per');
        DB::table('persona')
            ->where('id_per', $id)
            ->update(['id_contrib' => $id_contrib,'id_ident' => $id_ident,'id_ciu' => $id_ciu, 'doc_per' => $doc_per , 'organiz_per' => $organiz_per, 'nombre_per' => $nombre_per,'apel_per'=> $apel_per,'direc_per'=> $direc_per,'fono1_per'=> $fono1_per,'fono2_per'=> $fono2_per,'cel1_per'=> $cel1_per,'cel2_per'=> $cel2_per,'fecnac_per'=> $fecnac_per,'correo_per'=> $correo_per,'estado_per'=> $estado_per,'fechaini_per'=> $fechaini_per,'fechafin_per'=> $fechafin_per]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
     public function  eliminarPersona($id)
    {
        $estado_per = 'I';
        DB::table('persona')
            ->where('id_per', $id)
            ->update(['estado_per'=> $estado_per]);
        return ;
    }
}