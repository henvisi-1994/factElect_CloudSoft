@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Reportes Inventarios
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
                                Descripcion de Inventarios
                            </th>
                            <th>
                                Total de Productos de Inventario
                            </th>
                            <th>
                                Capital Neto
                            </th>
                                                        <th>
                                Capital PVP
                            </th>
                                                        <th>
                                Utilidad
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="inventario in r_inventarios">
                            <td>
                                @{{inventario.mes}}
                            </td>
                            <td>
                                @{{inventario.descripcion_inv}}
                            </td>
                            <td>
                            	@{{inventario.numprod_inv}}
                            </td>
                                                        <td>
                            	@{{inventario.capneto_inv}}
                            </td>
                                                        <td>
                            	@{{inventario.cappvp_inv}}
                            </td>
                                                        <td>
                            	@{{inventario.util_inv}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" :href="'/DescargaRInventario/'+inventario.mes" title="Descargar">
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
