<form method="POST" v-on:submit.prevent="updateParam_Docs(fillParam_Porc.id_param_porc)">
    <div class="modal fade" id="editParam_Porc">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Modificar Parámeto de Porcentaje
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
                            <input class="form-control" id="exampleInputEmail1" name="nomb_param_porc" placeholder="Ingrese Nombre " type="text" v-model="fillParam_Porc.nomb_param_porc">
                            </input>
                        </div>

                         <div class="form-group">
                            <label>
                                Observación
                            </label>
                            <textarea class="form-control" name="observ_param_porc" placeholder="Ingrese Observación" rows="3" v-model="fillParam_Porc.observ_param_porc">
                            </textarea>
                        </div>
                       
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_param_porc" v-model="fillParam_Porc.estado_param_porc">
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
                            <input class="form-control" name="fechaini_param_porc" type="date" v-model="fillParam_Porc.fechaini_param_porc">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_param_porc" type="date" v-model="fillParam_Porc.fechafin_param_porc">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Empresa
                            </label>
                            <select class="form-control" name="id_emp" v-model="fillParam_Porc.id_emp">
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
                            <select class="form-control" name="id_fec" v-model="fillParam_Porc.id_fec">
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