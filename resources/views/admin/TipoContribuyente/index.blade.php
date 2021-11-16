<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Tipo de Contribuyente
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearTipoContribuyente" data-toggle="modal">
                Crear
            </a>
        </div>
        <br>
            <br/>
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
                            Configuración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="tipoContribuyente in tipoContribuyentes">
                        <td>
                            @{{tipoContribuyente.nomb_contrib}}
                        </td>
                        <td>
                            @{{tipoContribuyente.obser_contrib}}
                        </td>

                         <td>
                            <div v-if="tipoContribuyente.estado_contrib == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="tipoContribuyente.estado_contrib == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="tipoContribuyente.estado_contrib == 'I'">
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
                            @{{tipoContribuyente.fechaini_contrib}}
                        </td>
                        <td>
                            @{{tipoContribuyente.fechafin_contrib}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editTipoContribuyente(tipoContribuyente)">
                                <i aria-hidden="true" class="fa fa-pencil-square-o">
                                </i>
                            </a>
                            <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteTipoContribuyente(tipoContribuyente)">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('admin.TipoContribuyente.Crear')
            @include('admin.TipoContribuyente.Modificar')
    </div>
</div>
