@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Categoria
        </h1>
    </div>
    <div class="box-body">
        <a class="btn btn-primary pull-left" data-target="#crearCategoria" data-toggle="modal" href="#">
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
                        <input id="exampleInputEmail1" name="buscar_cat" placeholder="Ingrese Nombre" type="text" v-model="buscar_cat">
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
                        <tr v-for="categoria in buscarCategoria">
                            <td>
                                @{{categoria.nomb_cat}}
                            </td>
                            <td>
                                @{{categoria.observ_cat}}
                            </td>
                            <td>
                                <div v-if="categoria.estado_cat == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="categoria.estado_cat == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="categoria.estado_cat == 'I'">
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
                                @{{categoria.fechaini_cat}}
                            </td>
                            <td>
                                @{{categoria.fechafin_cat}}
                            </td>
                            <td>
                                @{{categoria.nombre_emp}}
                            </td>
                            <td>
                                @{{categoria.nomb_fec}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editCategoria(categoria)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteCategoria(categoria)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
                @include('admin.Categoria.Crear')
            @include('admin.Categoria.Modificar')
            </br>
        </br>
    </div>
</div>
@endsection