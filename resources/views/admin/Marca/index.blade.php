@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Marca
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearMarca" data-toggle="modal">
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
                    <tr v-for="marca in marcas">
                        <td>
                            @{{marca.nomb_marca}}
                        </td>
                        <td>
                            @{{marca.observ_marca}}
                        </td>
                        <td>
                            <div v-if="marca.estado_marca == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="marca.estado_marca == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="marca.estado_marca == 'I'">
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
                           @{{marca.fechaini_marca}}
                        </td>
                        <td>
                            @{{marca.fechafin_marca}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editMarca(marca)">
                                <i aria-hidden="true" class="fa fa-pencil-square-o">
                                </i>
                            </a>
                            <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteMarca(marca)">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('admin.Marca.Crear')
            @include('admin.Marca.Modificar')
        </br>
    </div>
</div>
@endsection
