@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Identificaciones
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearIdentificaciones" data-toggle="modal">
                Crear
            </a>
        </div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            Identificación SRI
                        </th>
                        <th>
                            Descripción
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
                    <tr v-for="identificacion in identificaciones">
                        <td>
                            @{{identificacion.sri_ident}}
                        </td>
                        <td>
                            @{{identificacion.descrip_ident}}
                        </td>
                        <td>
                            @{{identificacion.observ_ident}}
                        </td>
                        <td>
                            @{{identificacion.estado_ident}}
                        </td>
                        <td>
                            @{{identificacion.fechaini_ident}}
                        </td>
                        <td>
                            @{{identificacion.fechafin_ident}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editIdentificacion(identificacion)">
                                <i aria-hidden="true" class="fa fa-pencil-square-o">
                                </i>
                            </a>
                            <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteIdentificacion(identificacion)">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('admin.Identificaciones.Crear')
            @include('admin.Identificaciones.Modificar')
        </br>
    </div>
</div>

<!-- /.box-body -->
@endsection
