@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Reportes Ventas
        </h1>
    </div>
    <div class="box-body">
        <br>
            <br>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Precio de Ventas
                            </th>
                            <th>
                                Empresa
                            </th>
                            <th>
                                Configuración
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="venta in r_ventas">
                            <td>
                                @{{venta.mes}}
                            </td>
                            <td>
                                @{{venta.ventas}}
                            </td>
                            <td>
                            	@{{venta.razon_emp}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" :href="'/DescargaRVenta/'+venta.mes" title="Descargar">
                                    <i aria-hidden="true" class="fa fa-download">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </br>
        </br>
    </div>
</div>
@endsection
