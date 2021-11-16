@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Empresa
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearEmpresa" data-toggle="modal">
                Crear
            </a>
        </div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                                                <th>
                                ID
                            </th>
                        <th>
                                Nombre
                            </th>
                            <th>
                                RUC
                            </th>
                            <th>
                                Razon Social
                            </th>
                            <th>
                                Direción
                            </th>
                            <th>
                                Telefono
                            </th>
                            <th>
                                Celular
                            </th>
                            <th>
                                 Tipo de Contribuyente
                            </th>
                            <th>
                                Ciudad
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                                Total de Establecimientos
                            </th>
                            <th>
                                Fecha Inicio
                            </th>
                            <th>
                            Fecha Fin
                            </th>
                            <th>
                                Configuración
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="empresa in empresas">
                        <td>
                                @{{empresa.id_emp}}
                            </td>
                        <td>
                                @{{empresa.nombre_emp}}
                            </td>
                            <td>
                                @{{empresa.rucempresa_emp}}
                            </td>
                             <td>
                                @{{empresa.razon_emp}}
                            </td>
                             <td>
                                @{{empresa.direcc_emp}}
                            </td>
                            <td>
                                @{{empresa.telefono_emp}}
                            </td>
                            <td>
                                @{{empresa.celular_emp}}
                            </td>
                            <td>
                                @{{empresa.tipcontrib_emp}}
                            </td>
                            <td>
                                @{{empresa.nomb_ciu}}
                            </td>
                        <td>
                            <div v-if="empresa.estado_emp == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="empresa.estado_emp == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="empresa.estado_emp == 'I'">
                                    <span class="label label-danger">
                                        Inactivo
                                    </span>
                                </div>
                                <div v-else="">
                                    <span class="label label-warning">
                                        En proceso
                                    </span>
                                </div>
                        </td>
                         <td WIDTH="30">
                        @{{empresa.totestab_emp}}
                        </td>
                        <td>
                           @{{empresa.fechaini_emp}}
                        </td>
                        <td>
                            @{{empresa.fechafin_emp}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editEmpresa(empresa)">
                                <i aria-hidden="true" class="fa fa-pencil-square-o">
                                </i>
                            </a>
                            <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteEmpresa(empresa)">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('admin.Empresa.Crear')
            @include('admin.Empresa.Modificar')
        </br>
    </div>
</div>
@endsection




