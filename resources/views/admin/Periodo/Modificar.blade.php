<form method="POST" v-on:submit.prevent="updatePeriodo(fillPeriodo.id_fec)">
    <div class="modal fade" id="editPeriodo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Crear
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
                            <input class="form-control" id="exampleInputEmail1" name="nomb_fec" placeholder="Ingrese Nombre" type="text" v-model="fillPeriodo.nomb_fec">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Observacion
                            </label>
                            <textarea class="form-control" name="observ_fec" placeholder="Ingrese Observación" rows="3" v-model="fillPeriodo.observ_fec">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_fec" v-model="fillPeriodo.estado_fec">
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
                                Mes
                            </label>
                            <select class="form-control" name="estado_fec" v-model="fillPeriodo.estado_fec">
                                <option disabled="" selected="" value="none">
                                    Selecione Mes
                                </option>
                                <option value="1">
                                    Enero
                                </option>
                                <option value="2">
                                    Febrero
                                </option>
                                <option value="3">
                                    Marzo
                                </option>
                                <option value="4">
                                    Abril
                                </option>
                                <option value="5">
                                    Mayo
                                </option>
                                <option value="6">
                                    Junio
                                </option>
                                <option value="7">
                                    Julio
                                </option>
                                <option value="8">
                                    Agosto
                                </option>
                                <option value="9">
                                    Septiembre
                                </option>
                                <option value="10">
                                    Octubre
                                </option>
                                <option value="11">
                                    Noviembre
                                </option>
                                <option value="12">
                                    Diciembre
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Inicial:
                            </label>
                            <input class="form-control" name="fechaini_fec" type="date" v-model="fillPeriodo.fechaini_fec">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_fec" type="date" v-model="fillPeriodo.fechafin_fec">
                            </input>
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
