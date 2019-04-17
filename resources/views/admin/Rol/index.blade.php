<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Rol
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box-body">
            <div class="card-body d-flex justify-content-between align-items-center">
                <a class="btn btn-primary btn-sm" data-target="#crearRol" data-toggle="modal">
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
                        <tr v-for="rol in roles">
                             <td>
                                @{{rol.nomb_rol}}
                            </td>
                            <td>
                                @{{rol.observ_rol}}
                            </td>
                            <td>
                               <div v-if="rol.estado_rol == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="rol.estado_rol == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="rol.estado_rol == 'I'">
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
                                @{{rol.fechaini_rol}}
                            </td>
                            <td>
                                @{{rol.fechafin_rol}}
                            </td>
                             <td>
                                @{{rol.nombre_emp}}
                            </td>
                            <td>
                                @{{rol.nomb_fec}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editRol(rol)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteRol(rol)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @include('admin.Rol.Crear')
                @include('admin.Rol.Modificar')
            </br>
        </div>
    </div>
</div>

