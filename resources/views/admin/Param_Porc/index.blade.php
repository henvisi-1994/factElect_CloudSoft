<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Parámetro de Porcentajes
        </h1>
    </div>
    <div class="box-body">
        <a class="btn btn-primary pull-left" data-target="#crearParam_Porc" data-toggle="modal" href="#">
            Crear
        </a>
        <br>
            </br>
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
                        <input id="exampleInputEmail1" name="buscar_param_porc" placeholder="Ingrese Nombre" type="text">
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
                        <tr v-for="param_porc in param_porcs">
                            <td>
                                @{{param_porc.nomb_param_porc}}
                            </td>
                            <td>
                                @{{param_porc.observ_param_porc}}
                            </td>
                            <td>
                                <div v-if="param_porc.estado_param_porc == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="param_porc.estado_param_porc == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="param_porc.estado_param_porc == 'I'">
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
                                @{{param_porc.fechaini_param_porc}}
                            </td>
                            <td>
                                @{{param_porc.fechafin_param_porc}}
                            </td>
                            
                            <td>
                                @{{param_porc.nombre_emp}}
                            </td>
                            <td>
                                @{{param_porc.nomb_fec}}
                            </td>
                            
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editParam_Porc(param_porc)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteParam_Porc(param_porc)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @include('admin.Param_Porc.Crear')
            @include('admin.Param_Porc.Modificar')
    </div>
</div>
