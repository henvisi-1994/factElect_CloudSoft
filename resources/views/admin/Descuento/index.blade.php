@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Descuento
        </h1>
    </div>
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary pull-left" data-target="#crearDescuento" data-toggle="modal" href="#">
                Crear
            </a>
        </div>
        <br>
        </br>
        <table class="table table-hover table-striped">
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
                        Empresa
                    </th>
                    <th>
                        Periodo
                    </th>
                    <th>
                        Configuración
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="descuento in descuentos">
                    <td>
                        @{{descuento.nomb_desc}}
                    </td>
                    <td>
                        @{{descuento.observ_desc}}
                    </td>
                    <td>
                        <div v-if="descuento.estado_desc == 'A'">
                            <span class="label label-success">
                                Activo
                            </span>
                        </div>
                        <div v-else-if="descuento.estado_desc == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="descuento.estado_desc == 'I'">
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
                        @{{descuento.fechaini_desc}}
                    </td>
                    <td>
                        @{{descuento.fechafin_desc}}
                    </td>
                    <td>
                        @{{descuento.nombre_emp}}
                    </td>
                    <td>
                        @{{descuento.nomb_fec}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editDescuento(descuento)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteDescuento(descuento)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Descuento.Crear')
        @include('admin.Descuento.Modificar')
    </div>
</div>
@endsection