<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Forma de Pago
        </h1>
    </div>
    <div class="box-body">
          <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm"  data-target="#crearFormaPago" data-toggle="modal" href="#">
                Crear
            </a>
        </div>
        <br>
            <br>
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
                        <tr v-for="formapago in formaPago">
                            <td>
                                @{{formapago.nomb_formapago}}
                            </td>
                            <td>
                                @{{formapago.observ_formapago}}
                            </td>
                            <td>
                                <div v-if="formapago.estado_formapago == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="formapago.estado_formapago == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="formapago.estado_formapago == 'I'">
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
                                @{{formapago.fechaini_formapago}}
                            </td>
                            <td>
                                @{{formapago.fechafin_formapago}}
                            </td>
                            <td>
                                @{{formapago.nombre_emp}}
                            </td>
                            <td>
                                @{{formapago.nomb_fec}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editFormaPago(formapago)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteFormaPago(formapago)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @include('admin.FormaPago.Crear')
               @include('admin.FormaPago.Modificar')
            </br>
        </br>
    </div>
</div>
