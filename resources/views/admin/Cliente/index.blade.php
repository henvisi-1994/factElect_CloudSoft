<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Cliente
        </h1>
    </div>
    <div class="box-body">
        <a class="btn btn-primary pull-left" data-target="#crearPersonaCli" data-toggle="modal" href="#">
            Crear
        </a>
        <br>
            </br>
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
                        <tr v-for="cliente in clientes">
                            <td>
                                @{{cliente.cod_cli}}
                            </td>
                            <td>
                                @{{cliente.observ_cli}}
                            </td>
                            <td>
                                <div v-if="cliente.estado_cli == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="cliente.estado_cli == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="cliente.estado_cli == 'I'">
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
                                @{{cliente.fechaini_cli}}
                            </td>
                            <td>
                                @{{cliente.fechafin_cli}}
                            </td>
                            <td>
                                @{{cliente.nombre_emp}}
                            </td>
                            <td>
                                @{{cliente.nomb_fec}}
                            </td>
                             <td>
                                @{{cliente.nombre_per}}@{{clientes.apel_per}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editCliente(cliente)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteCliente(cliente)">
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
    </div>
</div>
