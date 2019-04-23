<form method="POST" v-on:submit.prevent="createParam_Docs">
    <div class="modal fade" id="crearParam_Docs">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Añadir Parámeto de Documento
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="nomb_param_docs" placeholder="Ingrese Nombre " type="text" v-model="newParam_Docs.nomb_param_docs">
                            </input>
                        </div>

                         <div class="form-group">
                            <label>
                                Observación
                            </label>
                            <textarea class="form-control" name="observ_param_docs" placeholder="Ingrese Observación" rows="3" v-model="newParam_Docs.observ_param_docs">
                            </textarea>
                        </div>
                       
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_param_docs" v-model="newParam_Docs.estado_param_docs">
                                <option disabled="" selected="" value="none">
                                    Seleccione Estado
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
                            <input class="form-control" name="fechaini_param_docs" type="date" v-model="newParam_Docs.fechaini_param_docs">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_param_docs" type="date" v-model="newParam_Docs.fechafin_param_docs">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Empresa
                            </label>
                            <select class="form-control" name="id_emp" v-model="newParam_Docs.id_emp">
                                <option disabled="" selected="" value="none">
                                    Seleccione una Empresa
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
                            <select class="form-control" name="id_fec" v-model="newParam_Docs.id_fec">
                                <option disabled="" selected="" value="none">
                                    Seleccione un Periodo
                                </option>
                                @foreach($fechas as $periodo)
                                <option value="{{$periodo->id_fec}}">
                                    {{$periodo->nomb_fec}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                            <!-- /.input group -->
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