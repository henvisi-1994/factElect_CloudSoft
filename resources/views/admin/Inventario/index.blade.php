<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Inventarios
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearInventario" data-toggle="modal">
                Crear
            </a>
        </div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            Descripción Inventario
                        </th>
                        <th>
                            Numero de Productos Inventarios
                        </th>
                        <th>
                            Numero Existente de Productos
                        </th>
                        <th>
                            Capital Neto
                        </th>
                        <th>
                            Capital PVP
                        </th>
                                                <th>
                            Utilidades
                        </th>
                                                <th>
                            Observacion
                        </th>
                                                <th>
                            Estado
                        </th>
                                                <th>
                            Fecha de Inicio
                        </th>
                                                                        <th>
                            Fecha de Fin
                        </th>
                                                                        <th>
                            Bodega
                        </th>
                                                                        <th>
                            Empresa
                        </th>
                        <th>
                            Configuración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="inventario in inventarios">
                        <td>
                            @{{inventario.descripcion_inv}}
                        </td>
                        <td>
                            @{{inventario.numprod_inv}}
                        </td>
                        <td>
                            @{{inventario.numexist_inv}}
                        </td>
                        <td>
                            @{{inventario.capneto_inv}}
                        </td>
                         <td>
                            @{{inventario.cappvp_inv}}
                        </td>
                        <td>
                            @{{inventario.util_inv}}
                        </td>
                                                <td>
                            @{{inventario.observ_inv}}
                        </td>
                        <td>
                            <div v-if="inventario.estado_inv == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="inventario.estado_inv== 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="inventario.estado_inv == 'I'">
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
                           @{{inventario.fechaini_inv}}
                        </td>
                        <td>
                            @{{inventario.fechafin_inv}}
                        </td>
                         <td>
                            @{{inventario.nombre_bod}}
                        </td>
                         <td>
                            @{{inventario.razon_emp}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editInventario(inventario)">
                                <i aria-hidden="true" class="fa fa-pencil-square-o">
                                </i>
                            </a>
                            <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteInventario(inventario)">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('admin.Inventario.crear')
            @include('admin.Inventario.modificar')
        </br>
    </div>
</div>


