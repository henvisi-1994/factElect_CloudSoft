<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\DetalleFactura;
use App\Fecha_periodo;
use App\FormaPago;
use App\Marca;
use App\Persona;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
        $v = $this->validate(request(), [
            'num_fact' => ['required', 'string'],
            'id_formapago' => ['required'],
        ]);
        if ($v) {
            $factura = new Factura();
            $factura->id_formapago = $request->input('id_formapago');
            $factura->id_per = $request->input('id_per');
            $factura->num_fact = $request->input('num_fact');
            $factura->fecha_emision_fact = $request->input(
                'fecha_emision_fact'
            );
            $factura->hora_emision_fact = $request->input('hora_emision_fact');
            $factura->vencimiento_fact = $request->input('vencimiento_fact');
            $factura->estado_fact = $request->input('estado_fact');
            $factura->tipo_fact = $request->input('tipo_fact');
            $factura->observ_fact = $request->input('observ_fact');
            $factura->subtotal_fact = $request->input('subtotal_fact');
            $factura->subcero_fact = $request->input('subcero_fact');
            $factura->subiva_fact = $request->input('subiva_fact');
            $factura->subice_fact = $request->input('subice_fact');
            $factura->total_fact = $request->input('total_fact');
            $factura->save();
            return;
        } else {
            return back()->withInput($request->all());
        }
    }
    public function getFacturaVenta()
    {
        $facturas = DB::table('factura as fac')
            ->join(
                'formapago',
                'fac.id_formapago',
                '=',
                'formapago.id_formapago'
            )
            ->join('persona', 'fac.id_per', '=', 'persona.id_per')
            ->where('tipo_fact', '=', 'Venta')
            ->orderBy('fac.id_fact', 'des')
            ->get();
        return $facturas;
    }
    public function preguardarFacturaVenta(Request $request)
    {
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
            compact('factura', 'categorias', 'marcas', 'formas_pago')
        );
    }
    public function ultimonumFactVenta()
    {
        $numFactVent = Factura::select('num_fact')
            ->where('tipo_fact', '=', 'Venta')
            ->latest()
            ->get();
        $num = substr($numFactVent, -13);
        $num = substr($num, 0, -3);
        return $num;
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
    public function guardarFacturaCompra()
    {
        $url = 'http://factelect_cloudsoft.net/dfacturas/prueba.xml';
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
        $factura = new Factura();
        $factura->id_formapago = $this->formaPago(
            $xmlContent->comprobante->factura->infoFactura->pagos->pago
                ->formaPago[0]
        );
        $factura->id_per = $this->guardarPersona(
            $xmlContent->comprobante->factura->infotributaria
        );
        $factura->num_fact = $numFactura;
        $factura->fecha_emision_fact =
            $xmlContent->comprobante->factura->infoFactura->fechaEmision[0];
        $factura->hora_emision_fact = $horaAutorizacion;
        // $factura->vencimiento_fact=  $request->input('vencimiento_fact');
        $factura->estado_fact = 'A';
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
            $this->guardarDetalleFacturaCompra($detalle);
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
                $formapago = 'COMPENSACIÓN DE DEUDAS ';
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
                $formapago = 'OTROS CON UTILIZACIÓN DEL SISTEMA FINANCIERO ';
                break;
            case '21':
                $formapago = 'ENDOSO DE TÍTULOS ';
                break;
        }
        $id_formapago = DB::table('formapago')
            ->where('nomb_formapago', 'like', $formapago . '%')
            ->get();
        return $id_formapago->id_formapago;
    }
    public function guardarPersona($infotributaria)
    {
        $persona = new Persona();
        /* $persona->id_contrib=$request->input('id_contrib');
        $persona->id_ident=$request->input('id_ident');
        $persona->id_ciu=$request->input('id_ciu');*/
        $persona->doc_per = $infotributaria->ruc[0];
        // $persona->organiz_per=$request->input('organiz_per');
        $persona->nombre_per = $infotributaria->razonSocial[0];
        // $persona->apel_per=$request->input('apel_per');
        $persona->direc_per = $infotributaria->dirMatriz[0];
        /* $persona->fono1_per=$request->input('fono1_per');
        $persona->fono2_per=$request->input('fono2_per');
        $persona->cel1_per=$request->input('cel1_per');
        $persona->cel2_per=$request->input('cel2_per');
        $persona->fecnac_per=$request->input('fecnac_per');
        $persona->correo_per=$request->input('correo_per');
        $persona->estado_per=$request->input('estado_per');
        $persona->fechaini_per=$request->input('fechaini_per');
        $persona->fechafin_per=$request->input('fechafin_per');*/
        $persona->save();
        $persona_ced = Persona::where('doc_per', $persona->doc_per)->first();
        $id_per = $persona_ced->id_per;
        return $id_per;
    }
    public function guardarDetalleFacturaCompra($detalle)
    {
        $total =
            $detalle->precioTotalSinImpuesto +
            $detalle->impuestos->impuesto->valor;
        $detalleFact = new DetalleFactura();
        // $detalleFact->id_fact=$idFactura->id_fact;
        // $detalleFact->id_prod=$request->input('id_prod');
        $detalleFact->cantidad = $detalle->cantidad;
        $detalleFact->descripcion = $detalle->descripcion;
        $detalleFact->precio_prod = $detalle->precioUnitario;
        $detalleFact->descuento = $detalle->descuento;
        $detalleFact->neto = $detalle->precioTotalSinImpuesto;
        $detalleFact->iva = $detalle->impuestos->impuesto->valor;
        $detalleFact->$total;
        $detalleFact->save();
    }
}
