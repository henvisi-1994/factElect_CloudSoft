<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fecha_periodo;
use App\Empresa;
use App\Marca;
use App\Categoria;
use App\Bodega;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Producto;

class ProductoController extends Controller
{
    //Producto
    public function Producto()
    {
        $productos = DB::select('SELECT id_prod,nombre_emp, nomb_fec, codigo_prod,codbarra_prod,descripcion_prod,nomb_marca,present_prod,precio_prod,ubicacion_prod,stockmin_prod,stockmax_prod,fechaing_prod,fechaelab_prod,fechacad_prod,aplicaiva_prod,aplicaice_prod,util_prod,comision_prod,imagen_prod,observ_prod,estado_prod,fechaini_prod,fechafin_prod FROM producto
       INNER JOIN empresa ON producto.id_emp= empresa.id_emp
       INNER JOIN fecha_periodo ON producto.id_fec= fecha_periodo.id_fec
       INNER JOIN marca ON producto.id_marca= marca.id_marca');
        return view('admin.Producto.index', compact('productos'));
    }
    public function getProducto()
    {
        $productos = DB::table('producto as prod')
            ->join('empresa', 'prod.id_emp', '=', 'empresa.id_emp')
            ->join('fecha_periodo', 'prod.id_fec', '=', 'fecha_periodo.id_fec')
            ->join('marca', 'prod.id_marca', '=', 'marca.id_marca')
            ->join('categoria', 'prod.id_cat', '=', 'categoria.id_cat')
            ->join('bodega', 'prod.id_bod', '=', 'bodega.id_bod')
            ->orderBy("prod.id_prod", "desc")
            ->get();
        return  $productos;
    }
    public function CargarProducto()
    {
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $marcas = Marca::get();
        return view('admin.Producto.Crear', compact('empresas', 'fechas', 'marcas'));
    }

    public function guardarProducto(Request $request)
    {
        $v = $this->validate(request(), [
            'codigo_prod' => 'required|string',
            'precio_prod' => 'required|numeric',
            'codbarra_prod' => 'required|numeric',
            'id_marca' => 'required',
            'id_cat' => 'required',
            'id_bod' => 'required',
            'stockmin_prod' => 'required|numeric',
            'stockmax_prod' => 'required|numeric',
            'precio_prod' => 'required|numeric|between:0,9999.99',
            'util_prod' => 'required|numeric|between:0,9999.99',
            'comision_prod' => 'required|numeric|between:0,9999.99',
        ]);
        if ($v) {
            list($type, $imageData) = explode(';', $request->imagen_prod);
            list(, $extension) = explode('/', $type);
            list(, $imageData) = explode(',', $imageData);
            $name = $request->codbarra_prod . '.' . $extension;
            $source = fopen($request->imagen_prod, 'r');
            $destination = fopen(public_path() . '/img/producto/' . $name, 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);
            $producto = new Producto();
            $producto->id_emp  =  $request->input('id_emp');
            $producto->id_fec =  $request->input('id_fec');
            $producto->id_bod =  $request->input('id_bod');
            $producto->codigo_prod =  $request->input('codigo_prod');
            $producto->codbarra_prod =  $request->input('codbarra_prod');
            $producto->descripcion_prod = $request->input('descripcion_prod');
            $producto->id_marca =  $request->input('id_marca');
            $producto->id_cat =  $request->input('id_cat');
            $producto->present_prod =  $request->input('present_prod');
            $producto->precio_prod =  $request->input('precio_prod');
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
        } else {
            return back()->withInput($request->all());
        }
    }
    public function premodificarProducto(Request $request, $id)
    {
        $producto = Producto::where('id_prod', $id)->first();
        $empresas = Empresa::get();
        $fechas = Fecha_periodo::get();
        $marcas = Marca::get();
        return view('admin.Producto.Modificar', compact('producto', 'empresas', 'fechas', 'marcas'));
    }
    public function modificarProducto(Request $request, $id)
    {
        $v = $this->validate(request(), [
            'codigo_prod' => 'required|string',
            'precio_prod' => 'required|numeric',
            'codbarra_prod' => 'required|numeric',
            'id_marca' => 'required',
            'id_cat' => 'required',
            'id_bod' => 'required',
            'stockmin_prod' => 'required|numeric',
            'stockmax_prod' => 'required|numeric',
            'precio_prod' => 'required|numeric|between:0,9999.99',
            'util_prod' => 'required|numeric|between:0,9999.99',
            'comision_prod' => 'required|numeric|between:0,9999.99',
        ]);
        if ($v) {
            if (!empty($var)) {
                list($type, $imageData) = explode(';', $request->imagen_prod);
                list(, $extension) = explode('/', $type);
                list(, $imageData) = explode(',', $imageData);
                $name = $request->codbarra_prod . '.' . $extension;
                $source = fopen($request->imagen_prod, 'r');
                $destination = fopen(public_path() . '/img/producto/' . $name, 'w');
                stream_copy_to_stream($source, $destination);
                fclose($source);
                fclose($destination);
                $imagen_prod = $name;
            }
            $id_emp  =  $request->input('id_emp');
            $id_fec =  $request->input('id_fec');
            $id_bod =  $request->input('id_bod');
            $codigo_prod =  $request->input('codigo_prod');
            $codbarra_prod =  $request->input('codbarra_prod');
            $descripcion_prod = $request->input('descripcion_prod');
            $id_marca =  $request->input('id_marca');
            $id_cat =  $request->input('id_cat');
            $present_prod =  $request->input('present_prod');
            $precio_prod =  $request->input('precio_prod');
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
                ->update(
                    [
                        'id_emp' => $id_emp, 'id_fec' => $id_fec, 'id_bod' => $id_bod, 'codigo_prod' => $codigo_prod, 'codbarra_prod' => $codbarra_prod,
                        'descripcion_prod' => $descripcion_prod, 'id_marca' => $id_marca, 'id_cat' => $id_cat, 'present_prod' => $present_prod,  'precio_prod' => $precio_prod,
                        'ubicacion_prod' => $ubicacion_prod,  'stockmin_prod' => $stockmin_prod,  'stockmax_prod' => $stockmax_prod, 'fechaing_prod'  => $fechaing_prod,  'fechaelab_prod' => $fechaelab_prod, 'fechacad_prod' => $fechacad_prod, 'aplicaiva_prod' => $aplicaiva_prod, 'aplicaice_prod' => $aplicaice_prod, 'util_prod' => $util_prod,  'comision_prod' => $comision_prod, 'imagen_prod' => $imagen_prod,
                        'observ_prod' => $observ_prod, 'estado_prod' => $estado_prod, 'fechaini_prod' => $fechaini_prod, 'fechafin_prod' => $fechafin_prod
                    ]
                );
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function eliminarProducto($id)
    {
        $estado_prod = 'I';
        DB::table('producto')
            ->where('id_prod', $id)
            ->update(
                ['estado_prod' => $estado_prod]
            );
        return;
    }
}
