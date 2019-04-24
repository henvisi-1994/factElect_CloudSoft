<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Formularios
        </h1>
    </div>
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearFormulario" data-toggle="modal" href="#">
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
                        Formulario Principal
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
                <tr v-for="formulario in formularios">
                    <td>
                        @{{formulario.nomb_codform}}
                    </td>
                    <td>
                        @{{formulario.formPrincipal}}
                    </td>
                    <td>
                        @{{formulario.observ_codform}}
                    </td>
                    <td>
                        <div v-if="formulario.estado_codform == 'A'">
                            <span class="label label-success">
                                Activo
                            </span>
                        </div>
                        <div v-else-if="formulario.estado_codform == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="formulario.estado_codform == 'I'">
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
                        @{{formulario.fechaini_codform}}
                    </td>
                    <td>
                        @{{formulario.fechafin_codform}}
                    </td>
                    <td>
                        @{{formulario.nombre_emp}}
                    </td>
                    <td>
                        @{{formulario.nomb_fec}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editFormulario(formulario)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteFormulario(formulario)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Formulario.Crear')
       @include('admin.Formulario.Modificar')
    </div>
</div>
