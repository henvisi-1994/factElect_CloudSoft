<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Periodo
        </h1>
    </div>
    <div class="box-body">
          <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm"  data-target="#crearPeriodo" data-toggle="modal" href="#">
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
                            Mes
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
                        <tr v-for="periodo in periodos">
                            <td>
                                @{{periodo.nomb_fec}}
                            </td>
                            <td>
                                @{{periodo.observ_fec}}
                            </td>
                             <td>
                                @{{periodo.mesidentif_fec}}
                            </td>
                            <td>
                                <div v-if="periodo.estado_fec == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="periodo.estado_fec == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="periodo.estado_fec == 'I'">
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
                                @{{periodo.fechaini_fec}}
                            </td>
                            <td>
                                @{{periodo.fechafin_fec}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editPeriodo(periodo)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deletePeriodo(periodo)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @include('admin.Periodo.Crear')
               @include('admin.Periodo.Modificar')
            </br>
        </br>
    </div>
</div>
