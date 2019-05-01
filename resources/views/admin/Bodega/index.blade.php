@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Bodega
        </h1>
    </div>
    <div class="box-body">
        <a class="btn btn-primary pull-left" data-target="#crearBodega" data-toggle="modal" href="#">
            Crear
        </a>
        <br>
            <br>
                <div class="container-fluid">
                    <div class="col-xs-12 col-lg-8">
                        <label>
                            Ver
                        </label>
                        <select class="input-small" name="numregistros" v-model="numregistros" @click.prevent="registros(pagination.current_page)">
                            <option value="1">
                                1
                            </option>
                            <option value="10">
                                10
                            </option>
                            <option value="25">
                                25
                            </option>
                            <option value="20">
                                20
                            </option>
                            <option value="100">
                                100
                            </option>
                        </select>
                        <label>
                            Registros
                        </label>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <label for="exampleInputEmail1">
                            Buscar:
                        </label>
                        <input id="exampleInputEmail1" name="buscar_bod" placeholder="Ingrese Nombre" type="text">
                        </input>
                    </div>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Dirección
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                             <th>
                                Teléfono
                            </th>
                            <th>
                                Célular
                            </th>
                            <th>
                                Contacto
                            </th>
                                Fecha Inicio
                            </th>
                            <th>
                                Fecha Fin
                            </th>
                            <th>
                                País
                            </th>
                            <th>
                                Provincia
                            </th>
                            <th>
                                Ciudad
                            </th>
                            <th>
                                Configuración
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="bodega in bodegas">
                            <td>
                                @{{bodega.nombre_bod}}
                            </td>
                            <td>
                                @{{bodega.direcc_bod}}
                            </td>
                            <td>
                                <div v-if="bodega.estado_bod == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="bodega.estado_bod == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="bodega.estado_bod == 'I'">
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
                                @{{bodega.telef_bod}}
                            </td>
                             <td>
                                @{{bodega.cel_bod}}
                            </td>
                             <td>
                                @{{bodega.nomb_contac_bod}}
                            </td>
                            <td>
                                @{{bodega.fechaini_bod}}
                            </td>
                            <td>
                                @{{bodega.fechafin_bod}}
                            </td>
                            
                            <td>
                                @{{bodega.nomb_pais}}
                            </td>
                            <td>
                                @{{bodega.nomb_prov}}
                            </td>
                            <td>
                                @{{bodega.nomb_ciu}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editBodega(bodega)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteBodega(bodega)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
                @include('admin.Bodega.Crear')
            @include('admin.Bodega.Modificar')
            </br>
        </br>
    </div>
</div>
@endsection