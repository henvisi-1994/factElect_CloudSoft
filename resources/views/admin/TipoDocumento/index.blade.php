<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Tipo de Documento
        </h1>
    </div>
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearTipoDocumento" data-toggle="modal" href="#">
                Crear
            </a>
        </div>
        <br>
        </br>
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
                <tr v-for="TipoDocumento in tipoDocumento">
                    <td>
                        @{{TipoDocumento.nomb_doc}}
                    </td>
                    <td>
                        @{{TipoDocumento.observ_doc}}
                    </td>
                    <td>
                        <div v-if="TipoDocumento.estado_doc == 'A'">
                            <span class="label label-success">
                                Activo
                            </span>
                        </div>
                        <div v-else-if="TipoDocumento.estado_doc == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="TipoDocumento.estado_doc == 'I'">
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
                        @{{TipoDocumento.fechaini_doc}}
                    </td>
                    <td>
                        @{{TipoDocumento.fechafin_doc}}
                    </td>
                    <td>
                        @{{TipoDocumento.nombre_emp}}
                    </td>
                    <td>
                        @{{TipoDocumento.nomb_fec}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editTipoDocumento(TipoDocumento)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteTipoDocumento(TipoDocumento)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.TipoDocumento.Crear')
        @include('admin.TipoDocumento.Modificar')
    </div>
</div>