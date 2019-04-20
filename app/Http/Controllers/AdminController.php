<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;
use App\Fecha_periodo;
use App\Categoria;
use App\Marca;
use App\Unidad;
use App\Ciudad;
use App\Persona;
use App\Proveedor;
use App\Producto;
use App\Identificaciones;
use App\TipoContribuyente;
use App\Bodega;
use App\Pais;
use App\Provincia;
use App\Roles;
use App\Cliente;
use App\Descuento;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;


class AdminController extends Controller
{
  public function inicio()
  {
  	return view('admin.index');
  }
  public function Compras()
  {
    $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
     $marcas = Marca::get();
     $unidades = Unidad::get();
     $proveedores = DB::select('SELECT id_prov ,nombre_emp, nomb_fec, cod_prov,nombre_per,apel_per,obser_prov,estado_prov,fechaini_prov,fechafin_prov FROM proveedor
        INNER JOIN empresa ON proveedor.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON proveedor.id_fec= fecha_periodo.id_fec
        INNER JOIN persona ON proveedor.id_per= persona.id_per');
     $productos = DB::select('SELECT id_prod,nombre_emp, nomb_fec, codigo_prod,codbarra_prod,descripcion_prod,nomb_marca,present_prod,precio_prod,ubicacion_prod,stockmin_prod,stockmax_prod,fechaing_prod,fechaelab_prod,fechacad_prod,aplicaiva_prod,aplicaice_prod,util_prod,comision_prod,imagen_prod,observ_prod,estado_prod,fechaini_prod,fechafin_prod FROM producto
      INNER JOIN empresa ON producto.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON producto.id_fec= fecha_periodo.id_fec
      INNER JOIN marca ON producto.id_marca= marca.id_marca');
      $empresas = Empresa::get();
      $fechas = Fecha_periodo::get();
      $personas = Persona::get();
      $tipoContribuyentes= TipoContribuyente::get();
      $identificaciones = Identificaciones::get();
      $ciudades = Ciudad::get();
    return view('admin.compras',compact('categorias','marcas','unidades','proveedores','productos','empresas','fechas','personas','tipoContribuyentes','identificaciones','ciudades'));
  }
   public function Ventas()
  {
    $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
     $marcas = Marca::get();
     $unidades = Unidad::get();
     $proveedores = DB::select('SELECT id_prov ,nombre_emp, nomb_fec, cod_prov,nombre_per,apel_per,obser_prov,estado_prov,fechaini_prov,fechafin_prov FROM proveedor
        INNER JOIN empresa ON proveedor.id_emp= empresa.id_emp
        INNER JOIN fecha_periodo ON proveedor.id_fec= fecha_periodo.id_fec
        INNER JOIN persona ON proveedor.id_per= persona.id_per');
     $productos = DB::select('SELECT id_prod,nombre_emp, nomb_fec, codigo_prod,codbarra_prod,descripcion_prod,nomb_marca,present_prod,precio_prod,ubicacion_prod,stockmin_prod,stockmax_prod,fechaing_prod,fechaelab_prod,fechacad_prod,aplicaiva_prod,aplicaice_prod,util_prod,comision_prod,imagen_prod,observ_prod,estado_prod,fechaini_prod,fechafin_prod FROM producto
      INNER JOIN empresa ON producto.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON producto.id_fec= fecha_periodo.id_fec
      INNER JOIN marca ON producto.id_marca= marca.id_marca');
     $empresas = Empresa::get();
     $fechas = Fecha_periodo::get();
     $ciudades = Ciudad::get();
    $tipoContribuyentes = TipoContribuyente::get();
    $identificaciones = Identificaciones::get();
    return view('admin.ventas',compact('categorias','marcas','unidades','proveedores','productos','empresas','fechas','ciudades','tipoContribuyentes','identificaciones'));
  }
   public function configuracion()
  {
     $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
      INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
     $marcas = Marca::get();
     $paises=Pais::get();
     $provincias=Provincia::get();
     $unidades = Unidad::get();
     $empresas = Empresa::get();
     $fechas = Fecha_periodo::get();
     $ciudades = Ciudad::get();
     $tipoContribuyentes = TipoContribuyente::get();
     $identificaciones = Identificaciones::get();
     $descuentos = Descuento::get();
     $bodegas = Bodega::get();
     $roles = Roles::get();
     
    return view('admin.configuracion',compact('categorias','paises','provincias','unidades','marcas','empresas','fechas','ciudades','tipoContribuyentes','identificaciones','descuentos','bodegas','empresas','roles'));
  }
   public function contabilidad()
  {
   return view('admin.contabilidad');
  }
  
  public function getCategoria()
  {
   $categorias = DB::table('categoria as c')
      ->join('empresa', 'c.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'c.id_fec', '=', 'fecha_periodo.id_fec')
      ->orderBy("c.id_cat","desc")
      ->get();
      return $categorias;
  }
public function getMarca()
{
  $marcas = Marca::get();
  return $marcas;
}

public function getUnidad()
{
  $unidades = Unidad::get();
  return $unidades;
}
  public function CargarCategoria()
  {
  	$empresas = Empresa::get();
  	$fechas = Fecha_periodo::get();
  	return view('admin.Categoria.Crear',compact('empresas','fechas'));
  }
   public function CargarMarca()
  {

  	return view('admin.Marca.Crear');
  }
     public function CargarUnidad()
  {

  	return view('admin.Unidad.Crear');
  }
  //Funcion Guardar Categoria
    public function  guardarCategoria(Request $request)
    {
        $v=$this->validate(request(),[
            'nomb_cat' => 'required|string',
            'estado_cat' => 'required|string'
        ]);
                if ($v) {
                   $categoria= new Categoria;
                   $categoria->create($request->all());
                  return ;
                }
                else
                {
                   return back()->withInput($request->all());
                }
    }

    //Modificar Categoria
    public function  modificarCategoria(Request $request,$id)
    {
        $id_emp= $request->input('id_emp');
        $id_fec= $request->input('id_fec');
        $nomb_cat= $request->input('nomb_cat');
        $estado_cat= $request->input('estado_cat');
        $fechaini_cat= $request->input('fechaini_cat');
        $fechafin_cat= $request->input('fechafin_cat');
        $observ_cat= $request->input('observ_cat');
        DB::table('categoria')
            ->where('id_cat', $id)
            ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'nomb_cat' => $nomb_cat, 'estado_cat' => $estado_cat , 'fechaini_cat' => $fechaini_cat, 'fechafin_cat' => $fechafin_cat,'observ_cat'=> $observ_cat]
          );
        return;
    }
        //eliminar Categoria
    public function eliminarCategoria($id)
    {
        $estado_cat='I';
        DB::table('categoria')
            ->where('id_cat', $id)
            ->update(['estado_cat' => $estado_cat]
          );
        return;
    }
    //Guardar Marca
     public function  guardarMarca(Request $request)
    {
        
        $v =$this->validate(request(), [
            
            'nomb_marca' => 'required',
            'observ_marca' => 'required',
            'estado_marca' => 'required',
            'fechaini_marca' => 'required',
            'fechafin_marca' => 'required'
        ]);
        if ($v)
        {
          $marca= new Marca();
          $marca->id_marca=$request->input('id_marca');
          $marca->nomb_marca=$request->input('nomb_marca');
          $marca->observ_marca=$request->input('observ_marca');
          $marca->estado_marca=$request->input('estado_marca');
          $marca->fechaini_marca=$request->input('fechaini_marca');
          $marca->fechafin_marca=$request->input('fechafin_marca');
          $marca->save();
          return redirect('Marca');
        }
        else
        {
          return back()->withInput($request->all());
        }
    }

     //Modificar Marca
    public function  modificarMarca(Request $request,$id)
    {
        $nomb_marca= $request->input('nomb_marca');
        $estado_marca= $request->input('estado_marca');
        $fechaini_marca= $request->input('fechaini_marca');
        $fechafin_marca= $request->input('fechafin_marca');
        $observ_marca= $request->input('observ_marca');
        DB::table('marca')
            ->where('id_marca', $id)
            ->update(['nomb_marca' => $nomb_marca, 'estado_marca' => $estado_marca , 'fechaini_marca' => $fechaini_marca, 'fechafin_marca' => $fechafin_marca,'observ_marca'=> $observ_marca]
          );
        return;
    }
    //Eliminar Marca
    public function  eliminarMarca($id)
    { 
        $estado_marca= 'I';
        DB::table('marca')
            ->where('id_marca', $id)
            ->update(['estado_marca' => $estado_marca]
          );
        return;
    }
    //Guardar Unidad
      public function  guardarUnidad(Request $request)
    {
        $v =$this->validate(request(), [
            
            'nomb_unidad' => 'required',
            'observ_unidad' => 'required',
            'estado_unidad' => 'required',
            'fechaini_unidad' => 'required',
            'fechafin_unidad' => 'required'
        ]);
        if ($v)
        {
          $unidad= new Unidad();
          $unidad->id_unidad=$request->input('id_unidad');
          $unidad->nomb_unidad=$request->input('nomb_unidad');
          $unidad->observ_unidad=$request->input('observ_unidad');
          $unidad->estado_unidad=$request->input('estado_unidad');
          $unidad->fechaini_unidad=$request->input('fechaini_unidad');
          $unidad->fechafin_unidad=$request->input('fechafin_unidad');
          $unidad->save();
          return redirect('Compras');
        }
        else
        {
          return back()->withInput($request->all());
        }
    }

     //Modificar Unidad
    public function  modificarUnidad(Request $request,$id)
    {
        $nomb_unidad= $request->input('nomb_unidad');
        $estado_unidad= $request->input('estado_unidad');
        $fechaini_unidad= $request->input('fechaini_unidad');
        $fechafin_unidad= $request->input('fechafin_unidad');
        $observ_unidad= $request->input('observ_unidad');
        DB::table('unidad')
            ->where('id_unidad', $id)
            ->update(['nomb_unidad' => $nomb_unidad, 'estado_unidad' => $estado_unidad , 'fechaini_unidad' => $fechaini_unidad, 'fechafin_unidad' => $fechafin_unidad,'observ_unidad'=> $observ_unidad]
          );
        return;
    }
        //Eliminar Unidad
    public function  eliminarUnidad($id)
    { 
        $estado_unidad= 'I';
        DB::table('unidad')
            ->where('id_unidad', $id)
            ->update(['estado_unidad' => $estado_unidad]
          );
        return;
    }

      public function Ciudad()
  {
    $ciudades = DB::select('SELECT ciudad.id_ciu,ciudad.nomb_ciu,ciudad.estado_ciu,ciudad.fechaini_ciu,ciudad.fechafin_ciu,ciudad.observ_ciu,empresa.nombre_emp,fecha_periodo.nomb_fec FROM ciudad
      INNER JOIN empresa ON ciudad.id_emp= empresa.id_emp
      INNER JOIN fecha_periodo ON ciudad.id_fec = fecha_periodo.id_fec');
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
      return view('admin.Ciudad.index',compact('ciudades','empresas','fechas'));
  }
  //Funcion de Cargar Ciudad
   public function CargarCiudad()
  {
    $empresas = Empresa::get();
    $fechas = Fecha_periodo::get();
    return view('admin.Ciudad.Crear',compact('empresas','fechas'));
  }
    //Funcion Guardar Ciudad
    public function  guardarCiudad(Request $request)
    {

         $v =$this->validate(request(), [
            
            'nomb_ciu' => 'required',
            'id_emp' => 'required',
            'id_fec' => 'required',
            'estado_ciu' => 'required',
        ]);
        if ($v)
        {
          $ciudad= new Ciudad;
          $ciudad->create($request->all());
          return redirect('Compras');
        }
        else
        {
          return back()->withInput($request->all());
        }
    }

    //Modificar Ciudad
    public function  modificarCiudad(Request $request,$id)
    {
        $id_emp =  $request->input('id_emp');
        $id_fec =  $request->input('id_fec');
        $nomb_ciu =  $request->input('nomb_ciu');
        $estado_ciu =  $request->input('estado_ciu');
        $fechaini_ciu =  $request->input('fechaini_ciu');
        $fechafin_ciu =  $request->input('fechafin_ciu');
        $observ_ciu =  $request->input('observ_ciu');
        DB::table('ciudad')
            ->where('id_ciu', $id)
            ->update(['id_emp' => $id_emp,'id_fec' => $id_fec,'nomb_ciu' => $nomb_ciu, 'estado_ciu' => $estado_ciu , 'fechaini_ciu' => $fechaini_ciu, 'fechafin_ciu' => $fechafin_ciu,'observ_ciu'=> $observ_ciu]
          );
        return;
    }  
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
    public function TipoContribuyente()
    {
        $tiposContribuyentes = TipoContribuyente::get();
        return view('admin.TipoContribuyente.index',compact('tiposContribuyentes'));
    }
    public function CargarTipoContribuyente()
    {

        return view('admin.TipoContribuyente.Crear');
    }
        //Guardar TipoContribuyente
     public function  guardarTipoContribuyente(Request $request)
    {
        
        $v =$this->validate(request(), [
            
            'nomb_contrib' => 'required',
            'obser_contrib' => 'required',
            'estado_contrib' => 'required',
            'fechaini_contrib' => 'required',
            'fechafin_contrib' => 'required'
        ]);
        if ($v)
        {
            $tiposContribuyentes= new TipoContribuyente();
            $tiposContribuyentes->nomb_contrib=$request->input('nomb_contrib');
            $tiposContribuyentes->obser_contrib=$request->input('obser_contrib');
            $tiposContribuyentes->estado_contrib=$request->input('estado_contrib');
            $tiposContribuyentes->fechaini_contrib=$request->input('fechaini_contrib');
            $tiposContribuyentes->fechafin_contrib=$request->input('fechafin_contrib');
            $tiposContribuyentes->save();
            return redirect('TipoContribuyente');
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Tipo Contribuyente
    public function  modificarTipoContribuyente(Request $request,$id)
    {

       $v =$this->validate(request(), [
            
            'nomb_contrib' => 'required',
            'obser_contrib' => 'required',
            'estado_contrib' => 'required',
            'fechaini_contrib' => 'required',
            'fechafin_contrib' => 'required'
        ]);
        if ($v)
        {
        $nomb_contrib= $request->input('nomb_contrib');
        $obser_contrib= $request->input('obser_contrib');
        $estado_contrib= $request->input('estado_contrib');
        $fechaini_contrib= $request->input('fechaini_contrib');
        $fechafin_contrib= $request->input('fechafin_contrib');
        DB::table('tip_contrib')
            ->where('id_contrib', $id)
            ->update(['nomb_contrib' => $nomb_contrib, 'obser_contrib' => $obser_contrib , 'estado_contrib' => $estado_contrib, 'fechaini_contrib' => $fechaini_contrib,'fechafin_contrib'=> $fechafin_contrib]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarTipoContribuyente
    public function  eliminarTipoContribuyente($id)
    { 
        $estado_contrib= 'I';
        DB::table('tip_contrib')
            ->where('id_contrib', $id)
            ->update(['estado_contrib' => $estado_contrib]
          );
        return;
    }

    //Funcion Identificaciones
     public function Identificaciones()
    {
        $identificacion = Identificaciones::get();
        return view('admin.Identificaciones.index',compact('identificacion'));
    }
    public function CargarIdentificaciones()
    {

        return view('admin.Identificaciones.Crear');
    }
        //Guardar Identificacion
     public function  guardarIdentificacion(Request $request)
    {
         
        $v =$this->validate(request(), [
            
            'sri_ident' => 'required',
            'descrip_ident' => 'required',
            'observ_ident' => 'required',
            'estado_ident' => 'required'
        ]);
        if ($v)
        {
            $identificacion= new Identificaciones();
            $identificacion->id_ident=$request->input('id_ident');
            $identificacion->sri_ident=$request->input('sri_ident');
            $identificacion->descrip_ident=$request->input('descrip_ident');
            $identificacion->observ_ident=$request->input('observ_ident');
            $identificacion->estado_ident=$request->input('estado_ident');
            $identificacion->fechaini_ident=$request->input('fechaini_ident');
            $identificacion->fechafin_ident=$request->input('fechafin_ident');
            $identificacion->save();
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
            
            'sri_ident' => 'required',
            'descrip_ident' => 'required',
            'observ_ident' => 'required',
            'estado_ident' => 'required'
        ]);
        if ($v)
        {
        $sri_ident= $request->input('sri_ident');
        $descrip_ident= $request->input('descrip_ident');
        $observ_ident= $request->input('observ_ident');
        $estado_ident= $request->input('estado_ident');
        $fechaini_ident= $request->input('fechaini_ident');
        $fechafin_ident= $request->input('fechafin_ident');
        DB::table('identificacion')
            ->where('id_ident', $id)
            ->update(['sri_ident' => $sri_ident, 'descrip_ident' => $descrip_ident , 'observ_ident' => $observ_ident, 'estado_ident' => $estado_ident,'fechaini_ident'=> $fechaini_ident,'fechafin_ident'=> $fechafin_ident]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }

    }
     //Eliminar Unidad
    public function  eliminarIdentificacion($id)
    { 
        $estado_ident= 'I';
        DB::table('identificacion')
            ->where('id_ident', $id)
            ->update(['estado_ident' => $estado_ident]
          );
        return;
    }

    //Producto
     public function getProducto()
    {
       $productos = DB::table('producto as prod')
      ->join('empresa', 'prod.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'prod.id_fec', '=', 'fecha_periodo.id_fec')
      ->join('marca', 'prod.id_marca', '=', 'marca.id_marca')
      ->orderBy("prod.id_prod","desc")
      ->get();
       return  $productos;
    }
    public function CargarProducto()
    {
    $empresas = Empresa::get();
    $fechas = Fecha_periodo::get();
    $marcas = Marca::get();
    return view('admin.Producto.Crear',compact('empresas','fechas','marcas'));
    }

   public function guardarProducto(Request $request)
    {
      $v= $this->validate(request(),[
            'codigo_prod' => 'required|string',
            'precio_prod' => 'required|numeric',
            'codbarra_prod' => 'required|numeric',
            'id_marca' => 'required',
            'stockmin_prod' => 'required|numeric',
            'stockmax_prod' => 'required|numeric',
            'precio_prod' =>'required|numeric|between:0,9999.99',
            'util_prod' =>'required|numeric|between:0,9999.99',
            'comision_prod'=>'required|numeric|between:0,9999.99',
        ]);
       if($v)
      {
      list($type,$imageData)=explode(';', $request->imagen_prod);
      list(,$extension)=explode('/', $type);
      list(,$imageData)=explode(',', $imageData);
      $name =$request->codbarra_prod.'.'.$extension;
      $source=fopen( $request->imagen_prod, 'r');
      $destination = fopen(public_path().'/img/producto/'.$name, 'w');
      stream_copy_to_stream($source, $destination);
      fclose( $source);
      fclose($destination);
         $producto = new Producto();
          $producto->id_emp  =  $request->input('id_emp');
          $producto->id_fec =  $request->input('id_fec');
          $producto->codigo_prod =  $request->input('codigo_prod');
          $producto->codbarra_prod =  $request->input('codbarra_prod');
          $producto->descripcion_prod= $request->input('descripcion_prod');
          $producto->id_marca =  $request->input('id_marca');
          $producto->present_prod=  $request->input('present_prod');
          $producto->precio_prod=  $request->input('precio_prod');
          $producto->ubicacion_prod =  $request->input('ubicacion_prod');
          $producto->stockmin_prod =  $request->input('stockmin_prod');
          $producto->stockmax_prod =  $request->input('stockmax_prod');
          $producto->fechaing_prod =  $request->input('fechaing_prod');
          $producto->fechaelab_prod =  $request->input('fechaelab_prod');
          $producto->fechacad_prod =  $request->input('fechacad_prod');
          $producto->aplicaiva_prod =  $request->input('aplicaiva_prod');
          $producto->aplicaice_prod =  $request->input('aplicaice_prod');
          $producto->util_prod =  $request->input('util_prod');
          $producto->comision_prod =  $request->input('comision_prod');
          $producto->imagen_prod =  $name;
          $producto->estado_prod =  $request->input('estado_prod');
          $producto->observ_prod =  $request->input('observ_prod');
          $producto->fechaini_prod =  $request->input('fechaini_prod');
          $producto->fechafin_prod =  $request->input('fechafin_prod');
          $producto->save();
          return $name;
      }
      else
      {
        return back()->withInput($request->all());
      }

    }
    public function premodificarProducto(Request $request,$id)
    {
        $producto = Producto::where('id_prod',$id)->first();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $marcas = Marca::get();
        return view('admin.Producto.Modificar',compact('producto','empresas','fechas','marcas'));
    }
    public function modificarProducto(Request $request,$id)
    {
      $v= $this->validate(request(),[
            'codigo_prod' => 'required|string',
            'precio_prod' => 'required|numeric',
            'codbarra_prod' => 'required|numeric',
            'id_marca' => 'required',
            'stockmin_prod' => 'required|numeric',
            'stockmax_prod' => 'required|numeric',
            'precio_prod' =>'required|numeric|between:0,9999.99',
            'util_prod' =>'required|numeric|between:0,9999.99',
            'comision_prod'=>'required|numeric|between:0,9999.99',
        ]);
       if($v)
      {
        if(!empty($var))
        {
           list($type,$imageData)=explode(';', $request->imagen_prod);
          list(,$extension)=explode('/', $type);
          list(,$imageData)=explode(',', $imageData);
          $name =$request->codbarra_prod.'.'.$extension;
          $source=fopen( $request->imagen_prod, 'r');
          $destination = fopen(public_path().'/img/producto/'.$name, 'w');
          stream_copy_to_stream($source, $destination);
          fclose( $source);
          fclose($destination);
          $imagen_prod = $name;
        }
      $id_emp  =  $request->input('id_emp');
      $id_fec =  $request->input('id_fec');
      $codigo_prod =  $request->input('codigo_prod');
      $codbarra_prod =  $request->input('codbarra_prod');
      $descripcion_prod= $request->input('descripcion_prod');
      $id_marca =  $request->input('id_marca');
      $present_prod=  $request->input('present_prod');
      $precio_prod=  $request->input('precio_prod');
      $ubicacion_prod =  $request->input('ubicacion_prod');
      $stockmin_prod =  $request->input('stockmin_prod');
      $stockmax_prod =  $request->input('stockmax_prod');
      $fechaing_prod =  $request->input('fechaing_prod');
      $fechaelab_prod =  $request->input('fechaelab_prod');
      $fechacad_prod =  $request->input('fechacad_prod');
      $aplicaiva_prod =  $request->input('aplicaiva_prod');
      $aplicaice_prod =  $request->input('aplicaice_prod');
      $util_prod =  $request->input('util_prod');
      $comision_prod =  $request->input('comision_prod');
      $imagen_prod =  $request->input('imagen_prod');
      $estado_prod =  $request->input('estado_prod');
      $observ_prod =  $request->input('observ_prod');
      $fechaini_prod =  $request->input('fechaini_prod');
      $fechafin_prod =  $request->input('fechafin_prod');
       DB::table('producto')
            ->where('id_prod', $id)
            ->update(  ['id_emp' => $id_emp,'id_fec' => $id_fec,'codigo_prod' => $codigo_prod,'codbarra_prod' => $codbarra_prod , 
  'descripcion_prod' => $descripcion_prod ,'id_marca' => $id_marca,'present_prod' => $present_prod ,  'precio_prod' => $precio_prod ,
  'ubicacion_prod' => $ubicacion_prod ,  'stockmin_prod' => $stockmin_prod ,  'stockmax_prod' => $stockmax_prod ,'fechaing_prod'  => $fechaing_prod ,  'fechaelab_prod' => $fechaelab_prod ,'fechacad_prod' => $fechacad_prod ,'aplicaiva_prod' => $aplicaiva_prod,'aplicaice_prod' => $aplicaice_prod,'util_prod' => $util_prod ,  'comision_prod' => $comision_prod,'imagen_prod' => $imagen_prod ,
  'observ_prod' => $observ_prod ,'estado_prod' => $estado_prod , 'fechaini_prod' => $fechaini_prod ,'fechafin_prod' => $fechafin_prod]
          );
            return ;     
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
       public function eliminarProducto($id)
    {
        $estado_prod='I';
        DB::table('producto')
            ->where('id_prod', $id)
            ->update(['estado_prod' => $estado_prod]
          );
        return;
    }
    
    public function getIdentificacion()
    {
        $identificacion = Identificaciones::get();
        return $identificacion;
        
    }

    public function getTipoContribuyente()
    {
      $tiposContribuyentes = TipoContribuyente::get();
      return $tiposContribuyentes;
    }

    public function getCiudad()
    {
      $ciudades = DB::table ('ciudad as ciu')
      ->join('empresa', 'ciu.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'ciu.id_fec', '=', 'fecha_periodo.id_fec')
      ->orderBy("ciu.id_ciu","desc")
      ->get();
      return $ciudades;

    }


    /////////////////////////////
    //// Metodos Bodega

     public function Bodega()
    {
        $bodegas = Bodega::get();
        return view('admin.Bodega.index',compact('bodegas'));
    }
    public function CargarBodega()
    {

        return view('admin.Bodega.Crear');
    }
        //Guardar Bodega
     public function  guardarBodega(Request $request)
    {
        
        $v =$this->validate(request(), [
            
            'nombre_bod' => 'required',
            'direcc_bod' => 'required',
            'telef_bod' => 'required',
            'cel_bod' => 'required',
            'estado_bod' => 'required',
            'nomb_contac_bod' => 'required',
            'fechaini_bod' => 'required',
            'fechafin_bod' => 'required'
        ]);
        if ($v)
        {
            $bodegas= new Bodega();
            $bodegas->id_ciu=$request->input('id_ciu');
            $bodegas->id_pais=$request->input('id_pais');
            $bodegas->id_prov=$request->input('id_prov');
            $bodegas->nombre_bod=$request->input('nombre_bod');
            $bodegas->direcc_bod=$request->input('direcc_bod');
            $bodegas->telef_bod=$request->input('telef_bod');
            $bodegas->cel_bod=$request->input('cel_bod');
            $bodegas->estado_bod=$request->input('estado_bod');
            $bodegas->nomb_contac_bod=$request->input('nomb_contac_bod');
            $bodegas->fechaini_bod=$request->input('fechaini_bod');
            $bodegas->fechafin_bod=$request->input('fechafin_bod');
            $bodegas->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Bodega
    public function  modificarBodega(Request $request,$id)
    {

       $v =$this->validate(request(), [
            
           'nombre_bod' => 'required',
            'direcc_bod' => 'required',
            'telef_bod' => 'required',
            'cel_bod' => 'required',
            'estado_bod' => 'required',
            'nomb_contac_bod' => 'required',
            'fechaini_bod' => 'required',
            'fechafin_bod' => 'required'
        ]);
        if ($v)
        {
            $id_ciu=$request->input('id_ciu');
            $id_pais=$request->input('id_pais');
            $id_prov=$request->input('id_prov');
            $nombre_bod=$request->input('nombre_bod');
            $direcc_bod=$request->input('direcc_bod');
            $telef_bod=$request->input('telef_bod');
            $cel_bod=$request->input('cel_bod');
            $estado_bod=$request->input('estado_bod');
            $nomb_contac_bod=$request->input('nomb_contac_bod');
            $fechaini_bod=$request->input('fechaini_bod');
            $fechafin_bod=$request->input('fechafin_bod');
            DB::table('bodega')
            ->where('id_bod', $id)
            ->update(['nombre_bod' => $nombre_bod, 'direcc_bod' => $direcc_bod , 'telef_bod' => $telef_bod, 'cel_bod' => $cel_bod,'estado_bod'=> $estado_bod,'nomb_contac_bod'=> $nomb_contac_bod,'fechaini_bod'=> $fechaini_bod,'fechafin_bod'=> $fechafin_bod,'id_ciu'=> $id_ciu,'id_pais'=> $id_pais,'id_prov'=> $id_prov]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarBodega
    public function  eliminarBodega($id)
    { 
        $estado_bod= 'I';
        DB::table('bodega')
            ->where('id_bod', $id)
            ->update(['estado_bod' => $estado_bod]
          );
        return;
    }


     public function getBodega()
    {
      $bodegas = DB::table('bodega as b')
      ->join('pais', 'b.id_pais', '=', 'pais.id_pais')
      ->join('provincia', 'b.id_prov', '=', 'provincia.id_prov')
      ->join('ciudad', 'b.id_ciu', '=', 'ciudad.id_ciu')
      ->orderBy("b.id_bod","desc")
      ->get();
      return $bodegas;
    }


/////////////////////////////
    //// Metodos Pais

     public function Pais()
    {
        $paises = Pais::get();
        return view('admin.Pais.index',compact('paises'));
    }
    public function CargarPais()
    {

        return view('admin.Pais.Crear');
    }
        //Guardar Pais
     public function  guardarPais(Request $request)
    {
        
        $v =$this->validate(request(), [
            
            'nomb_pais' => 'required',
            'estado_pais' => 'required'
            
        ]);
        if ($v)
        {
            $paises= new Pais();
            $paises->nomb_pais=$request->input('nomb_pais');
            $paises->estado_pais=$request->input('estado_pais');
            $paises->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Pais
    public function  modificarPais(Request $request,$id)
    {

       $v =$this->validate(request(), [
            
            'nomb_pais' => 'required',
            'estado_pais' => 'required'
        ]);
        if ($v)
        {
            $nomb_pais=$request->input('nomb_pais');
            $estado_pais=$request->input('estado_pais');
            DB::table('pais')
            ->where('id_pais', $id)
            ->update(['nomb_pais' => $nomb_pais, 'estado_pais'=> $estado_pais]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarPais
    public function  eliminarPais($id)
    { 
        $estado_pais= 'I';
        DB::table('pais')
            ->where('id_pais', $id)
            ->update(['estado_pais' => $estado_pais]
          );
        return;
    }


     public function getPais()
    {
        $paises = Pais::get();
        return $paises;
    }

    /////////////////////////////
    //// Metodos Provincia

     public function Provincia()
    {
        $provincias = Provincia::get();
        return view('admin.Provincia.index',compact('provincias'));
    }
    public function CargarProvincia()
    {

        return view('admin.Provincia.Crear');
    }
        //Guardar Provincia
     public function  guardarProvincia(Request $request)
    {
        
         $v =$this->validate(request(), [
            
            'nomb_prov' => 'required',
            'estado_prov' => 'required'
            
        ]);
        if ($v)
        {
            $provincias= new Provincia();
            $provincias->id_pais=$request->input('id_pais');
            $provincias->nomb_prov=$request->input('nomb_prov');
            $provincias->estado_prov=$request->input('estado_prov');
            $provincias->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Provincia
    public function  modificarProvincia(Request $request,$id)
    {

       $v =$this->validate(request(), [
            
            'nomb_prov' => 'required',
            'estado_prov' => 'required'
        ]);
        if ($v)
        {
            $id_pais=$request->input('id_pais');
            $nomb_prov=$request->input('nomb_prov');
            $estado_prov=$request->input('estado_prov');
            DB::table('provincia')
            ->where('id_prov', $id)
            ->update(['nomb_prov' => $nomb_prov, 'estado_prov' => $estado_prov,'id_pais'=> $id_pais]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarProvincia
    public function  eliminarProvincia($id)
    { 
        $estado_prov= 'I';
        DB::table('provincia')
            ->where('id_prov', $id)
            ->update(['estado_prov' => $estado_prov]
          );
        return;
    }


     public function getProvincia()
    {
      $provincias = DB::table('provincia as p')
      ->join('pais', 'p.id_pais', '=', 'pais.id_pais')
      ->orderBy("p.id_prov","desc")
      ->get();
      return $provincias;
    }
//empresa
    public function getEmpresa()
    {
      $empresas = DB::table('empresa as emp')
      ->join('ciudad','emp.id_ciu','=','ciudad.id_ciu')
      ->orderBy("emp.id_emp","des")
      ->get();
      return $empresas;
    }
     public function guardarEmmpresa(Request $request)
    {
      $v= $this->validate(request(),[
            'rucempresa_emp' => 'required|numeric',
            'razon_emp' => 'required|string',
            'nombre_emp' => 'required|string',
            'apellido_emp' => 'required|string',
            'direcc_emp' => 'required',
            'telefono_emp' => 'required|numeric',
            'contador_emp' =>'required|string',
        ]);
       if($v)
      {
        $empresa= new Empresa();
        $empresa->create($request->all());
       return ;     
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
    public function modificarEmpresa(Request $request,$id)
    {
       $v= $this->validate(request(),[
            'rucempresa_emp' => 'required|numeric',
            'razon_emp' => 'required|string',
            'nombre_emp' => 'required|string',
            'apellido_emp' => 'required|string',
            'direcc_emp' => 'required',
            'telefono_emp' => 'required|numeric',
            'contador_emp' =>'required|string',
        ]);
       if($v)
      {
        $id_ciu  =  $request->input('id_ciu');
        $totestab_emp  =  $request->input('totestab_emp');
        $rucempresa_emp  =  $request->input('rucempresa_emp');
        $razon_emp  =  $request->input('razon_emp');
        $nombre_emp  =  $request->input('nombre_emp');
        $apellido_emp  =  $request->input('apellido_emp');
        $contacto_emp  =  $request->input('contacto_emp');
        $direcc_emp  =  $request->input('direcc_emp');
        $telefono_emp  =  $request->input('telefono_emp');
        $celular_emp  =  $request->input('celular_emp');
        $fax_emp  =  $request->input('fax_emp');
        $email_emp  =  $request->input('email_emp');
        $estado_emp  =  $request->input('estado_emp');
        $contador_emp  =  $request->input('contador_emp');
        $tipcontrib_emp  =  $request->input('tipcontrib_emp');
        $fechaini_emp  =  $request->input('fechaini_emp');
        $fechafin_emp  =  $request->input('fechafin_emp');
        DB::table('empresa')
            ->where('id_emp', $id)
            ->update(  ['id_ciu' => $id_ciu,'totestab_emp' => $totestab_emp,'rucempresa_emp' => $rucempresa_emp,'razon_emp' => $razon_emp , 
  'nombre_emp' => $nombre_emp ,'apellido_emp' => $apellido_emp,'contacto_emp' => $contacto_emp ,  'direcc_emp' => $direcc_emp ,
  'telefono_emp' => $telefono_emp ,  'celular_emp' => $celular_emp ,  'fax_emp' => $fax_emp ,'email_emp'  => $email_emp ,  'estado_emp' => $estado_emp ,'contador_emp' => $contador_emp ,'tipcontrib_emp' => $tipcontrib_emp,'fechaini_emp' => $fechaini_emp,'fechafin_emp' => $fechafin_emp ,  'comision_prod' => $comision_prod]
          );
         return ;     
          }
          else
      {
        return back()->withInput($request->all());
      }
    }
      public function eliminarEmpresa($id)
    {
        $estado_emp='I';
        DB::table('empresa')
            ->where('id_emp', $id)
            ->update(['estado_emp' => $estado_emp]
          );
        return;
    }
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


       /////////////////////////////
    //// Metodos Descuento

     public function Descuento()
    {
        $descuentos = Descuento::get();
        return view('admin.Descuento.index',compact('descuentos'));
    }
    public function CargarDescuento()
    {

        return view('admin.Descuento.Crear');
    }
        //Guardar Descuento
     public function  guardarDescuento(Request $request)
    {
        
        $v =$this->validate(request(), [
            
            'nomb_desc' => 'required',
            'observ_desc' => 'required',
            'estado_desc' => 'required',
            'fechaini_desc' => 'required',
            'fechafin_desc' => 'required'
        ]);
        if ($v)
        {
            $descuentos= new Descuento();
            $descuentos->id_emp=$request->input('id_emp');
            $descuentos->id_fec=$request->input('id_fec');
            $descuentos->nomb_desc=$request->input('nomb_desc');
            $descuentos->observ_desc=$request->input('observ_desc');
            $descuentos->estado_desc=$request->input('estado_desc');
            $descuentos->fechaini_desc=$request->input('fechaini_desc');
            $descuentos->fechafin_desc=$request->input('fechafin_desc');
            $descuentos->save();
            return;
        }
        else
        {
          return back()->withInput($request->all());
        }

    }
     //Modificar Descuento
    public function  modificarDescuento(Request $request,$id)
    {

       $v =$this->validate(request(), [
            
            'nomb_desc' => 'required',
            'observ_desc' => 'required',
            'estado_desc' => 'required',
            'fechaini_desc' => 'required',
            'fechafin_desc' => 'required'
        ]);
        if ($v)
        {
            $id_emp=$request->input('id_emp');
            $id_fec=$request->input('id_fec');
            $nomb_desc=$request->input('nomb_desc');
            $observ_desc=$request->input('observ_desc');
            $estado_desc=$request->input('estado_desc');
            $fechaini_desc=$request->input('fechaini_desc');
            $fechafin_desc=$request->input('fechafin_desc');
            DB::table('descuento')
            ->where('id_desc', $id)
            ->update(['nomb_desc' => $nomb_desc, 'observ_desc' => $observ_desc , 'estado_desc' => $estado_desc, 'fechaini_desc' => $fechaini_desc,'fechafin_desc'=> $fechafin_desc,'id_emp'=> $id_emp,'id_fec'=> $id_fec]
          );
        return;
      }
      else
        {
          return back()->withInput($request->all());
        }
    }
    //EliminarDescuento
    public function  eliminarDescuento($id)
    { 
        $estado_desc= 'I';
        DB::table('descuento')
            ->where('id_desc', $id)
            ->update(['estado_desc' => $estado_desc]
          );
        return;
    }


     public function getDescuento()
    {
      $descuentos = DB::table('descuento as d')
      ->join('empresa', 'd.id_emp', '=', 'empresa.id_emp')
      ->join('fecha_periodo', 'd.id_fec', '=', 'fecha_periodo.id_fec')
      ->orderBy("d.id_desc","desc")
      ->get();
      return $descuentos;
    }

}
