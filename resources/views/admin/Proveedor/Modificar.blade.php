<form method="POST" v-on:submit.prevent="updatePersona(fillPersona.id_per)">
    <div class="modal fade" id="editPersona" style="overflow-y: scroll;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Editar Datos Personales
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                        @{{ error }}
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Documento Personal
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="doc_per" placeholder="Ingrese Identificacion" type="text" v-model="fillPersona.doc_per">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Organizacion Persona
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="organiz_per" placeholder="Ingrese Organizacion" type="text" v-model="fillPersona.organiz_per">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre Persona
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="nombre_per" placeholder="Ingrese Nombre" type="text" v-model="fillPersona.nombre_per">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Apellido Persona
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="apel_per" placeholder="Ingrese Apellido" type="text" v-model="fillPersona.apel_per">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Telefono 1
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone">
                                    </i>
                                </div>
                                <input class="form-control" name="fono1_per" placeholder="(+999) 99 9999999" type="text" v-model="fillPersona.fono1_per">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Telefono 2
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone">
                                    </i>
                                </div>
                                <input class="form-control" name="fono2_per" placeholder="(+999) 99 9999999" type="text" v-model="fillPersona.fono2_per">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Celular 1
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone">
                                    </i>
                                </div>
                                <input class="form-control" name="cel1_per" placeholder="9999999999" type="text" v-model="fillPersona.cel1_per">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Celular 2
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone">
                                    </i>
                                </div>
                                <input class="form-control" name="cel2_per" placeholder="9999999999" type="text" v-model="fillPersona.cel2_per">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Correo Personal
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope">
                                    </i>
                                </span>
                                <input class="form-control" name="correo_per" placeholder="Ingrese Correo Personal" type="email" v-model="fillPersona.correo_per">
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                Direccion
                            </label>
                            <textarea class="form-control" name="direc_per" placeholder="Ingrese Direccion" rows="3" v-model="fillPersona.direc_per">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_per" v-model="fillPersona.estado_per">
                                <option disabled="" selected="" value="none">
                                    Selecione Estado
                                </option>
                                <option value="A">
                                    Activo
                                </option>
                                <option value="P">
                                    Pendiente
                                </option>
                                <option value="I">
                                    Inactivo
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Inicial:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control" name="fechaini_per" type="date" v-model="fillPersona.fechaini_per">
                                </input>
                            </div>
                            <!-- /.input group -->
                            <div class="form-group">
                                <label>
                                    Fecha Nacimiento:
                                </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </div>
                                    <input class="form-control" name="fecnac_per" type="date" v-model="fillPersona.fecnac_per">
                                    </input>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>
                                    Fecha Final:
                                </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </div>
                                    <input class="form-control" name="fechafin_per" type="date" v-model="fillPersona.fechafin_per">
                                    </input>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>
                                    Ciudad
                                </label>
                                <select class="form-control" name="id_ciu" v-model="fillPersona.id_ciu">
                                    <option disabled="" selected="" value="none">
                                        Selecione una Ciudad
                                    </option>
                                    @foreach($ciudades as $ciudad)
                                    <option value="{{$ciudad->id_ciu}}">
                                        {{$ciudad->nomb_ciu}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Identificacion
                                </label>
                                <select class="form-control" name="id_ident" v-model="fillPersona.id_ident">
                                    <option disabled="" selected="" value="none">
                                        Selecione una Identificacion
                                    </option>
                                    @foreach($identificaciones as $identificacion)
                                    <option value="{{$identificacion->id_ident}}">
                                        {{$identificacion->sri_ident}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                Contribuyente
                            </label>
                            <select class="form-control" name="id_contrib" v-model="fillPersona.id_contrib">
                                <option disabled="" selected="" value="none">
                                    Selecione un Contribuyente
                                </option>
                                @foreach($tipoContribuyentes as $contribuyente)
                                <option value="{{$contribuyente->id_contrib}}">
                                    {{$contribuyente->nomb_contrib}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" value="Siguente">
                        </input>
                         <input class="btn btn-primary" type="button" value="Omitir"  data-dismiss="modal" data-target="#editProveedor" data-toggle="modal" >
                        </input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>