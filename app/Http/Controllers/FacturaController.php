<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\DetalleFactura;
use App\Fecha_periodo;
use App\FormaPago;
use App\Marca;
use App\Persona;
use App\Producto;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    public function getFacturaCompra()
    {
        $facturas = DB::table('factura as fac')
            ->join(
                'formapago',
                'fac.id_formapago',
                '=',
                'formapago.id_formapago'
            )
            ->join('persona', 'fac.id_per', '=', 'persona.id_per')
            ->where('tipo_fact', '=', 'Compra')
            ->orderBy('fac.id_fact', 'des')
            ->get();
        return $facturas;
    }
    public function guardarFacturaVenta(Request $request)
    {
        $id_usuario=$request->input('id_usu');
        $v = $this->validate(request(), [
            'num_fact' => ['required', 'string'],
            'id_formapago' => ['required'],
        ]);
        if ($v) {
            $cajero = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
            $factura = new Factura();
            $factura->id_formapago = $request->input('id_formapago');
            $factura->id_per = $request->input('id_per');
            $factura->num_fact = $request->input('num_fact');
            $factura->fecha_emision_fact = $request->input(
                'fecha_emision_fact'
            );
            $factura->hora_emision_fact = $request->input('hora_emision_fact');
            $factura->estado_fact = $request->input('estado_fact');
            $factura->tipo_fact = $request->input('tipo_fact');
            $factura->observ_fact = $request->input('observ_fact');
            $factura->subtotal_fact = $request->input('subtotal_fact');
            $factura->subcero_fact = $request->input('subcero_fact');
            $factura->subiva_fact = $request->input('subiva_fact');
            $factura->subice_fact = $request->input('subice_fact');
            $factura->total_fact = $request->input('total_fact');
            $factura->id_empl=$cajero;
            $factura->save();
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function getFacturaVenta()
    {
        $facturas = DB::select('SELECT *FROM v_factura');
        return $facturas;
    }
        public function getProforma()
    {
        $facturas = DB::table('factura as fac')
            ->join(
                'formapago',
                'fac.id_formapago',
                '=',
                'formapago.id_formapago'
            )
            ->join('persona', 'fac.id_per', '=', 'persona.id_per')
            ->where('tipo_fact', '=', 'Proforma')
            ->orderBy('fac.id_fact', 'des')
            ->get();
        return $facturas;
    }
    public function preguardarFacturaVenta(Request $request)
    {
        $tipo_factura=$request->input('tipo_factura');
        $id_usu=$request->input('id_usu');
        $id = $request->input('buscar_cli');
        $factura = DB::table('cliente as c')
            ->join('empresa', 'c.id_emp', '=', 'empresa.id_emp')
            ->join('fecha_periodo', 'c.id_fec', '=', 'fecha_periodo.id_fec')
            ->join('persona', 'c.id_per', '=', 'persona.id_per')
            ->where('persona.doc_per', '=', $id)
            ->first();
        $categorias = DB::select('SELECT categoria.id_cat, categoria.nomb_cat,categoria.observ_cat,categoria.estado_cat,categoria.fechaini_cat,categoria.fechafin_cat,empresa.nombre_emp,fecha_periodo.nomb_fec FROM categoria
            INNER JOIN empresa ON categoria.id_emp= empresa.id_emp
            INNER JOIN fecha_periodo ON categoria.id_fec = fecha_periodo.id_fec');
        $marcas = Marca::get();
        $formas_pago = FormaPago::get();
        return view(
            'admin.FacturaVenta.Detalle',
            compact('factura', 'categorias', 'marcas', 'formas_pago','tipo_factura','id_usu')
        );
    }
    public function ultimonumFactVenta()
    {
        $numFactVent = DB::select('SELECT num_fact FROM factura WHERE tipo_fact="Venta" ORDER BY id_fact DESC LIMIT 1');
        $num = substr($numFactVent[0]->num_fact, -21);
        $num = explode("-", $numFactVent[0]->num_fact);
        //$num = substr($num[2], 0, 0);
        return $num[2];
    }

        public function ultimonumFacProforma()
    {
        $numFactprof = DB::select('SELECT num_fact FROM factura WHERE tipo_fact="Proforma" ORDER BY id_fact DESC LIMIT 1');
        $num_p = substr($numFactprof[0]->num_fact, -21);
        $num_p = explode("-", $numFactprof[0]->num_fact);
        //$num = substr($num[2], 0, 0);
        return $num_p[2];
    }

    public function getVentas()
    {
        $ventas = DB::table('factura')
            ->selectRaw(
                'case month(fecha_emision_fact)
                WHEN 1 THEN "Enero"
                WHEN 2 THEN "Febrero"
                WHEN 3 THEN "Marzo"
                WHEN 4 THEN "Abril"
                WHEN 5 THEN "Mayo"
                WHEN 6 THEN "Junio"
                WHEN 7 THEN "Julio"
                WHEN 8 THEN "Agosto"
                WHEN 9 THEN "Septiembre"
                WHEN 10 THEN "Octubre"
                WHEN 11 THEN "Noviembre"
                WHEN 12 THEN "Diciembre"
                 END mes ,subtotal_fact '
            )
            ->whereRaw(
                'year(fecha_emision_fact) = year(curdate()) and tipo_fact = "Venta"'
            )
            ->groupBy('mes')
            ->orderByRaw('Month(fecha_emision_fact)ASC')
            ->get();
        return $ventas;
    }
    public function getCompras()
    {
        $ventas = DB::table('factura')
            ->selectRaw(
                'case month(fecha_emision_fact)
                WHEN 1 THEN "Enero"
                WHEN 2 THEN "Febrero"
                WHEN 3 THEN "Marzo"
                WHEN 4 THEN "Abril"
                WHEN 5 THEN "Mayo"
                WHEN 6 THEN "Junio"
                WHEN 7 THEN "Julio"
                WHEN 8 THEN "Agosto"
                WHEN 9 THEN "Septiembre"
                WHEN 10 THEN "Octubre"
                WHEN 11 THEN "Noviembre"
                WHEN 12 THEN "Diciembre"
                 END mes ,subtotal_fact '
            )
            ->whereRaw(
                'year(fecha_emision_fact) = year(curdate()) and tipo_fact = "Compra"'
            )
            ->groupBy('mes')
            ->orderByRaw('Month(fecha_emision_fact)ASC')
            ->get();
        return $ventas;
    }
    public function guardarDetalleFacturaVenta(Request $request)
    {
        $detalle_factura = new DetalleFactura();
        $detalle_factura->id_fact = $request->input('id_fact');
        $detalle_factura->id_prod = $request->input('id_prod');
        $detalle_factura->cantidad = $request->input('cantidad');
        $detalle_factura->descripcion = $request->input('descripcion');
        $detalle_factura->precio_prod = $request->input('precio_prod');
        $detalle_factura->descuento = $request->input('descuento');
        $detalle_factura->neto = $request->input('neto');
        $detalle_factura->iva = $request->input('iva');
        $detalle_factura->total = $request->input('total');
        $detalle_factura->tipo_fact = $request->input('tipo_fact');
        $detalle_factura->save();
        return;
    }
    public function leer_xml()
    {
        /*$fullpath=__DIR__."\dfacturas\prueba.xml";
        $factura = simplexml_load_file($fullpath);
         // Ruta del archivo XML
         return $factura;*/
        $url = 'http://factelect_cloudsoft.net/dfacturas/prueba.xml';
        $xml = simplexml_load_file($url);

        /* Aquí lo mejor es manipular la información de tu XML de acuerdo a lo que se mostrará en la vista */

        return view('xml', ['xmlContent' => $xml]);
    }
    public function guardarFacturaCompra(Request $request)
    {
        $id_usuario=Auth::user()->id_usu;
        /*if($request->hasFile('facturaC')){
       //archivo
        $archivo = $request->file('facturaC');
        $url_archivo = 'http://factelect_cloudsoft.net';

        $path_file = $archivo->store('dfacturas');
        $path_archivo = $url_archivo.'/storage/'.$path_file;}*/
        list($type, $imageData) = explode(';', $request->facturaC);
            list(, $extension) = explode('/', $type);
            list(, $imageData) = explode(',', $imageData);
            $name = 'Fact001' . '.' . $extension;
            $source = fopen($request->facturaC, 'r');
            $destination = fopen(public_path() . '/dfacturas/' . $name, 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);
            $url_archivo = 'http://factelect_cloudsoft.net';
            $path_archivo = $url_archivo.'/dfacturas/'.$name;
        $url = $path_archivo;
        $xmlContent = simplexml_load_file($url);
        $fechaAutorizacion = $xmlContent->fechaAutorizacion;
        $horaAutorizacion = explode(' ', $fechaAutorizacion)[1];
        $numFactura =
            $xmlContent->comprobante->factura->infotributaria->codDoc[0] .
            ' - ' .
            $xmlContent->comprobante->factura->infotributaria->estab[0] .
            ' - ' .
            $xmlContent->comprobante->factura->infotributaria->ptoEmi[0] .
            ' - ' .
            $xmlContent->comprobante->factura->infotributaria->secuencial[0];
            $cajero = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[$id_usuario])[0]->id_empleado;
        $factura = new Factura();
        $factura->id_formapago = $this->formaPago(
            $xmlContent->comprobante->factura->infoFactura->pagos->pago
                ->formaPago[0]
        );
        $factura->id_per = $this->guardarPersona(
            $xmlContent->comprobante->factura->infotributaria
        );
        $factura->num_fact = $numFactura;
        $factura->fecha_emision_fact =date('Y-m-d', strtotime( $xmlContent->comprobante->factura->infoFactura->fechaEmision[0]));
        $factura->hora_emision_fact = $horaAutorizacion;
        $factura->estado_fact = 'PA';
        $factura->id_empl = $cajero;
        $factura->tipo_fact = 'Compra';
        $factura->observ_fact = '';
        $factura->subtotal_fact =
            $xmlContent->comprobante->factura->infoFactura->totalSinImpuestos[0];
        $factura->subcero_fact = 0;
        $factura->subiva_fact =
            $xmlContent->comprobante->factura->infoFactura->totalConImpuestos->totalImpuesto->valor[0];
        $factura->subice_fact = 0;
        $factura->total_fact =
            $xmlContent->comprobante->factura->infoFactura->importeTotal[0];
        $factura->save();
        foreach (
            $xmlContent->comprobante->factura->detalles->detalle
            as $detalle
        ) {
            $this->guardarDetalleFacturaCompra($detalle,$numFactura);
        }
    }
    public function formaPago($codigo)
    {
        $formapago = '';
        switch ($codigo) {
            case '01':
                $formapago = 'SIN UTILIZACIÓN DEL SISTEMA FINANCIERO';
                break;
            case '15':
                $formapago = 'COMPENSACIÓN DE DEUDAS';
                break;
            case '16':
                $formapago = 'TARJETA DE DÉBITO';
                break;
            case '17':
                $formapago = 'DINERO ELECTRÓNICO';
                break;
            case '18':
                $formapago = 'TARJETA PREPAGO';
                break;
            case '19':
                $formapago = 'TARJETA DE CRÉDITO';
                break;
            case '20':
                $formapago = 'OTROS CON UTILIZACIÓN DEL SISTEMA FINANCIERO';
                break;
            case '21':
                $formapago = 'ENDOSO DE TÍTULOS';
                break;
        }
        $id_formapago = DB::table('formapago')
            ->where('nomb_formapago', 'like', $formapago . '%')
            ->first();
        return $id_formapago->id_formapago;
    }
    public function guardarPersona($infotributaria)
    {
        $persona = new Persona();
        $persona->id_contrib=1;
        $persona->id_ident=2;
        $persona->id_ciu=1;
        $persona->doc_per = $infotributaria->ruc[0];
       $persona->organiz_per=$infotributaria->nombreComercial[0];
        $persona->nombre_per = $infotributaria->razonSocial[0];
        // $persona->apel_per=$request->input('apel_per');
        $persona->direc_per = $infotributaria->dirMatriz[0];
        //$persona->fono1_per=$request->input('fono1_per');
        //$persona->fono2_per=$request->input('fono2_per');
        //$persona->cel1_per=$request->input('cel1_per');
        //$persona->cel2_per=$request->input('cel2_per');
        //$persona->fecnac_per=$request->input('fecnac_per');
        //$persona->correo_per=$request->input('correo_per');
        $persona->estado_per='P';
        //$persona->fechaini_per=$request->input('fechaini_per');
        //$persona->fechafin_per=$request->input('fechafin_per');
        $persona->save();
        $persona_ced = Persona::where('doc_per', $persona->doc_per)->first();
        $id_per = $persona_ced->id_per;
        return $id_per;
    }
    public function guardarDetalleFacturaCompra($detalle,$num_fact)
    {
         $idFactura = DB::table('factura as fac')
        ->select ('id_fact')
        ->where('num_fact','=',$num_fact)->first();
        $detalleFact = new DetalleFactura();
        $detalleFact->id_fact=$idFactura->id_fact;
         $detalleFact->id_prod = $this->guardarProducto($detalle);
        $detalleFact->cantidad = $detalle->cantidad;
        $detalleFact->descripcion = $detalle->descripcion;
        $detalleFact->precio_prod = $detalle->precioUnitario;
        $detalleFact->descuento = $detalle->descuento;
        $detalleFact->neto = $detalle->precioTotalSinImpuesto;
        $detalleFact->iva = $detalle->impuestos->impuesto->valor;
        $detalleFact->total=$detalleFact->neto+$detalleFact->iva;
        $detalleFact->save();
    }
    public function guardarProducto($detalle){
            $producto = new Producto();
            $producto->id_emp  =  2;
            $producto->id_fec =  2;
            $producto->id_bod =  4;
            $producto->codigo_prod =  $detalle->codigoPrincipal[0];
            //$producto->codbarra_prod =  $detalle->input('codbarra_prod');
            $producto->descripcion_prod = $detalle->descripcion[0];
            $producto->id_marca = 5;
            $producto->id_cat = 1;
            //$producto->present_prod =  $detalle->input('present_prod');
            $producto->precio_prod =  $detalle->precioUnitario[0];
            /*$producto->ubicacion_prod =  $detalle->input('ubicacion_prod');
            $producto->stockmin_prod =  $detalle->input('stockmin_prod');
            $producto->stockmax_prod =  $detalle->input('stockmax_prod');
            $producto->fechaing_prod =  $detalle->input('fechaing_prod');
            $producto->fechaelab_prod =  $detalle->input('fechaelab_prod');
            $producto->fechacad_prod =  $detalle->input('fechacad_prod');
            $producto->aplicaiva_prod =  $detalle->input('aplicaiva_prod');
            $producto->aplicaice_prod =  $detalle->input('aplicaice_prod');
            $producto->util_prod =  $detalle->input('util_prod');
            $producto->comision_prod =  $detalle->input('comision_prod');*/
            $producto->estado_prod =  'A';
            /*$producto->observ_prod =  $detalle->input('observ_prod');
            $producto->fechaini_prod =  $detalle->input('fechaini_prod');
            $producto->fechafin_prod =  $detalle->input('fechafin_prod');*/
            $producto->save();
            $codigo_prod = Producto::where('codigo_prod', $producto->codigo_prod)->first();
            $id_prod = $codigo_prod->id_prod;
            return $id_prod;
    }
    public function dashboard_ventas(){
         $ventas = DB::select('SELECT DATE_FORMAT(fecha_emision_fact,"%Y-%m") AS y, SUM(total_fact) AS ventas  from factura  WHERE tipo_fact="Venta" GROUP BY
             DATE_FORMAT(fecha_emision_fact,"%Y-%m")');
             return $ventas;
    }
        public function dashboard_compras(){
         $compras = DB::select('SELECT DATE_FORMAT(fecha_emision_fact,"%Y-%m") AS y, SUM(total_fact) AS compras  from factura  WHERE tipo_fact="Compra" GROUP BY
        DATE_FORMAT(fecha_emision_fact,"%Y-%m")');
             return $compras;
    }

    public function download_factura($id_fact)
    {
        $factura = DB::select(
            'SELECT *FROM v_factura WHERE id_fact=?',
            [$id_fact]
        )[0];
                $detalle_factura = DB::select(
            'SELECT *FROM detalle_factura WHERE id_fact=?',
            [$id_fact]
        );
         $nombre_archivo=$factura->num_fact.".pdf";
    $data = [
        'detalle_factura'=>$detalle_factura,
        'num_fact'=>$factura->num_fact,
        'nombre_per'=>$factura->nombre_per,
        'apel_per'=>$factura->apel_per,
        'correo_per'=>$factura->correo_per,
        'direc_per'=>$factura->direc_per,
        'fecha_emision_fact'=>$factura->fecha_emision_fact,
        'vencimiento_fact'=>$factura->vencimiento_fact,
        'nomb_formapago'=>$factura->nomb_formapago,
        'total_fact'=>$factura->total_fact,
        'tipo_fact'=>$factura->tipo_fact,
        'nombre_empl'=>$factura->nombre_empl,
        'apellido_empl'=>$factura->apellido_empl,
    ];

    $pdf = PDF::loadView('comprobantefactura', $data);

    return $pdf->download($nombre_archivo);
    }
    public function asignar_cajero(){
         $cajero = DB::select(
            'SELECT id_empleado FROM v_empleado WHERE id_usu=? AND (nomb_rol="Cajero" OR nomb_rol="Administrador")',[7])[0]->id_empleado;
            return $cajero;
    }

}