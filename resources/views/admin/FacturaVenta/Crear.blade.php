<form method="POST"  action="preguardarFacturaVenta" >
    <div class="modal fade" id="crearFacturaVenta">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <i aria-hidden="true" class="fa fa-search">
                    </i>
                    <h4>
                        Selecione el Cliente
                    </h4>
                    <p>
                        Busca y selecciona el cliente.
                    </p>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                             <input class="form-control" name="tipo_factura" placeholder="Buscar" type="hidden" value="Venta">
                            </input>
                            <input class="form-control" name="id_usu" placeholder="Buscar" type="hidden" value="{{Auth::user()->id_usu}}">
                            </input>
                        <div class="form-group">
                            <label>
                                Cliente
                            </label>
                            <input class="form-control" name="buscar_cli" placeholder="Buscar" type="text" v-model="buscar_cli">
                            </input>
                        </div>
                        <div v-if="buscar_cli">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            RUC
                                        </th>
                                        <th>
                                            Organizacion
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Apellido
                                        </th>
                                        <th>
                                            Selecionar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="persona in buscarCliente">
                                        <td>
                                            @{{persona.doc_per}}
                                        </td>
                                        <td>
                                            @{{persona.organiz_per}}
                                        </td>
                                        <td>
                                            @{{persona.nombre_per}}
                                        </td>
                                        <td>
                                            @{{persona.apel_per}}
                                        </td>
                                        <td>
                                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Ir" v-on:click.prevent="mostarCliente(persona)">
                                                <i aria-hidden="true" class="fa fa-eye">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <fieldset disabled="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        RUC
                                    </label>
                                    <input class="form-control" id="exampleInputEmail1" name="ruc_cli" type="text" v-model="buscarCli.ruc_cli">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Empresa
                                    </label>
                                    <input class="form-control" id="exampleInputEmail1" name="organiz_per" type="text" v-model="buscarCli.organiz_per">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Nombres y Apellidos
                                    </label>
                                    <input class="form-control" id="exampleInputEmail1" name="nom_cli" type="text" v-model="buscarCli.nom_cli">
                                    </input>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="btn btn-primary" type="submit" value="Siguente">
                    </input>
                </div>
            </div>
        </div>
    </div>
</form>
