<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Proveedor
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary pull-left" data-target="#crearPersona" data-toggle="modal" href="#">
                Crear
            </a>
            &nbsp;&nbsp;<a class="btn btn-primary ml-6" data-target="#crearProveedor" data-toggle="modal" href="#">
                Asignar Proveedor
            </a>
            <br>
            </br>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Codigo
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
                <tr v-for="proveedor in proveedores">
                    <td>
                        @{{proveedor.cod_prov}}
                    </td>
                    <td>
                        @{{proveedor.obser_prov}}
                    </td>
                    <td>
                        <div v-if="proveedor.estado_prov == 'A'">
                            <span class="label label-success">
                                Activo
                            </span>
                        </div>
                        <div v-else-if="proveedor.estado_prov == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="proveedor.estado_prov== 'I'">
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
                        @{{proveedor.fechaini_prov}}
                    </td>
                    <td>
                        @{{proveedor.fechafin_prov}}
                    </td>
                    <td>
                        @{{proveedor.nombre_emp}}
                    </td>
                    <td>
                        @{{proveedor.nomb_fec}}
                    </td>
                    <td>
                        @{{proveedor.nombre_per}} @{{proveedor.apel_per}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editProveedor(proveedor)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteProveedor(proveedor)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Proveedor.Crear')
        @include('admin.Proveedor.CrearProveedor')
        @include('admin.Proveedor.Modificar')
        @include('admin.Proveedor.ModificarProveedor')
    </div>
</div>

<!-- /.box-body -->
