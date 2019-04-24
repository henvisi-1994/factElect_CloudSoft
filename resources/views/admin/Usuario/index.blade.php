<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Usuarios
        </h1>
    </div>
    <div class="box-body">
          <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm"  data-target="#crearUsuario" data-toggle="modal" href="#">
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
                           		 Rol
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
                        <tr v-for="usuario in usuarios">
                            <td>
                                @{{usuario.nomb_usu}}
                            </td>
                            <td>
                                @{{usuario.observ_usu}}
                            </td>
                            <td>
                                <div v-if="usuario.estado_usu == 'A'">
                                    <span class="label label-success">
                                        Activo
                                    </span>
                                </div>
                                <div v-else-if="usuario.estado_usu == 'P'">
                                    <span class="label label-warning">
                                        Pendiente
                                    </span>
                                </div>
                                <div v-else-if="usuario.estado_usu == 'I'">
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
                            	@{{usuario.nomb_rol}}
                            </td>
                            <td>
                                @{{usuario.fechaini_usu}}
                            </td>
                            <td>
                                @{{usuario.fechafin_usu}}
                            </td>
                            <td>
                                @{{usuario.nombre_emp}}
                            </td>
                            <td>
                                @{{usuario.nomb_fec}}
                            </td>
                            <td>
                                <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editUsuario(usuario)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                                <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteUsuario(usuario)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @include('admin.Usuario.Crear')
               @include('admin.Usuario.Modificar')
            </br>
        </br>
    </div>
</div>
