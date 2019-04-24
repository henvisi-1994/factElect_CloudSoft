<form method="POST" v-on:submit.prevent="updateUsuario(fillUsuario.id_usu)">
    <div class="modal fade" id="editUsuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Modificar
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                        @{{ error }}
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="nomb_usu" placeholder="Ingrese Nombre" type="text" v-model="fillUsuario.nomb_usu">
                            </input>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">
                                Contraseña
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="clave_usu" placeholder="Ingrese Nombre" type="password" v-model="fillUsuario.clave_usu">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Observacion
                            </label>
                            <textarea class="form-control" name="observ_usu" placeholder="Ingrese Observación" rows="3" v-model="fillUsuario.observ_usu">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_usu" v-model="fillUsuario.estado_usu">
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
                            <input class="form-control" name="fechaini_usu" type="date" v-model="fillUsuario.fechaini_usu">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_usu" type="date" v-model="fillUsuario.fechafin_usu">
                            </input>
                        </div>
                         <div class="form-group">
                            <label>
                                Rol
                            </label>
                            <select class="form-control" name="id_rol" v-model="fillUsuario.id_rol">
                                <option disabled="" selected="" value="none">
                                    Selecione un Rol
                                </option>
                                @foreach($roles as $rol)
                                <option value="{{$rol->id_rol}}">
                                    {{$rol->nomb_rol}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Empresa
                            </label>
                            <select class="form-control" name="id_emp" v-model="fillUsuario.id_emp">
                                <option disabled="" selected="" value="none">
                                    Selecione una Empresa
                                </option>
                                @foreach($empresas as $empresa)
                                <option value="{{$empresa->id_emp}}">
                                    {{$empresa->nombre_emp}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Periodo
                            </label>
                            <select class="form-control" name="id_fec" v-model="fillUsuario.id_fec">
                                <option disabled="" selected="" value="none">
                                    Selecione una Periodo
                                </option>
                                @foreach($fechas as $periodo)
                                <option value="{{$periodo->id_fec}}">
                                    {{$periodo->nomb_fec}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        </input>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Guardar">
                        </input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
