<form method="POST" v-on:submit.prevent="updateCliente(fillCliente.id_cli)">
    <div class="modal fade" id="editCliente">
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
                                Código
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="cod_cli" placeholder="Ingrese Código" type="text" v-model="fillCliente.cod_cli">
                            </input>
                        </div>

                       
                        <div class="form-group">
                            <label>
                                Observación
                            </label>
                            <textarea class="form-control" name="observ_cli" placeholder="Ingrese Observación" rows="3" v-model="fillCliente.observ_cli">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_cli" v-model="fillCliente.estado_cli">
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
                            <input class="form-control" name="fechaini_cli" type="date" v-model="fillCliente.fechaini_cli">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_cli" type="date" v-model="fillCliente.fechafin_cli">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Empresa
                            </label>
                            <select class="form-control" name="id_emp" v-model="fillCliente.id_emp">
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
                            <select class="form-control" name="id_fec" v-model="fillCliente.id_fec">
                                <option disabled="" selected="" value="none">
                                    Seleccione un Periodo
                                </option>
                                @foreach($fechas as $fecha)
                                <option value="{{$fecha->id_fec}}">
                                    {{$fecha->nomb_fec}}
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

