<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Cliente
        </h1>
    </div>
    <div class="box-body">
        <a class="btn btn-primary pull-left" data-target="#crearPersona" data-toggle="modal" href="#">
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
                        <input id="exampleInputEmail1" name="buscar_cli" placeholder="Ingrese Nombre" type="text" v-model="buscar_cli">
                        </input>
                    </div>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                Código
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
                                Persona
                            </th>
                            <th>
                                Configuración
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="clientes in cliente">
                            <td>
                                @{{clientes.cod_cli}}
                            </td>
                            <td>
                                @{{clientes.observ_cli}}
                            </td>
                            <td>
                                <div v-if="clientes.estado_cli == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="clientes.estado_cli == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="clientes.estado_cli == 'I'">
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
                                @{{clientes.fechaini_cli}}
                            </td>
                            <td>
                                @{{clientes.fechafin_cli}}
                            </td>
                            <td>
                                @{{clientes.nombre_emp}}
                            </td>
                            <td>
                                @{{clientes.nomb_fec}}
                            </td>
                             <td>
                                @{{clientes.nombre_per}}@{{clientes.apel_per}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editCliente(clientes)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteCliente(clientes)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
                @include('admin.Cliente.Crear')
                @include('admin.Cliente.CrearCliente')
            @include('admin.Cliente.Modificar')
            @include('admin.Cliente.ModificarCliente')
            </br>
        </br>
    </div>
</div>
