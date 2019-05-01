@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Unidad
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box-body">
            <div class="card-body d-flex justify-content-between align-items-center">
                <a class="btn btn-primary btn-sm" data-target="#crearUnidad" data-toggle="modal">
                    Crear
                </a>
            </div>
            <br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Observación
                            </th>
                            <th>
                                Estado
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
                        <tr v-for="unidad in unidades">
                            <td>
                                @{{unidad.nomb_unidad}}
                            </td>
                            <td>
                                @{{unidad.observ_unidad}}
                            </td>
                            <td>
                               <div v-if="unidad.estado_unidad == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="unidad.estado_unidad == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="unidad.estado_unidad == 'I'">
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
                            <td>
                                @{{unidad.fechaini_unidad}}
                            </td>
                            <td>
                                @{{unidad.fechafin_unidad}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editUnidad(unidad)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteUnidad(unidad)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @include('admin.Unidad.Crear')
                @include('admin.Unidad.Modificar')
            </br>
        </div>
    </div>
</div>
@endsection
