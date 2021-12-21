<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Empleado
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary ml-6" data-target="#crearEmpleado" data-toggle="modal" href="#">
                Crear
            </a>
            <br>
            </br>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Empleado
                    </th>
                    <th>
                        Empresa
                    </th>
                    <th>
                        Rol
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Configuración
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="empleado in empleados">
                    <td>
                        @{{empleado.nombre_empl}} @{{empleado.apellido_empl}}
                    </td>
                    <td>
                        @{{empleado.nombre_emp}}
                    </td>
                    <td>
                        @{{empleado.nomb_rol}}

                    </td>
                    <td>
                        @{{empleado.nomb_usu}}
                    </td>
                                        <td>
                        <div v-if="empleado.estado_empl == 'A'">
                            <span class="label label-success">
                                Activo
                            </span>
                        </div>
                        <div v-else-if="empleado.estado_empl == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="empleado.estado_empl== 'I'">
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
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editEmpleado(empleado)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteEmpleado(empleado)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Empleado.Crear')
        @include('admin.Empleado.Modificar')
        @include('admin.Empleado.ModificarProveedor')
    </div>
</div>

<!-- /.box-body -->
