<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Ciudad
        </h3>
    </div>
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearCiudad" data-toggle="modal">
                Crear
            </a>
        </div>
        <br>
        <br/>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                     <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Observación
                    </th>
                    <th>
                        Provincia
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
                <tr v-for="ciudad in ciudades">
                    <td>
                        @{{ciudad.id_ciu}}
                    </td>
                    <td>
                        @{{ciudad.nomb_ciu}}
                    </td>
                    <td>
                        @{{ciudad.observ_ciu}}
                    </td>
                    <td>
                        @{{ciudad.nomb_prov}}
                    </td>
                    <td>
                            <div v-if="ciudad.estado_ciu == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="ciudad.estado_ciu == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="ciudad.estado_ciu == 'I'">
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
                        @{{ciudad.fechaini_ciu}}
                    </td>
                    <td>
                        @{{ciudad.fechafin_ciu}}
                    </td>
                    <td>
                        @{{ciudad.nombre_emp}}
                    </td>
                    <td>
                        @{{ciudad.nomb_fec}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editCiudad(ciudad)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteCiudad(ciudad)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Ciudad.Crear')
        @include('admin.Ciudad.Modificar')
    </div>
</div>

