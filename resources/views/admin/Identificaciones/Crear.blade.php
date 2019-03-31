<form action="storeIdentificaciones" method="POST">
    <div class="modal fade" id="crearIdentificaciones">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Añadir Identificacion
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                    </span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Estado
                        </label>
                        <select class="form-control" name="sri_ident">
                            <option disabled="" selected="" value="none">
                                Selecione Identificación
                            </option>
                            <option value="N">
                                Natural
                            </option>
                            <option value="J">
                                Juridica
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="descrip_ident" placeholder="Ingrese Descripción" rows="3">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Observación
                            </label>
                            <textarea class="form-control" name="observ_ident" placeholder="Ingrese Observación" rows="3">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_ident">
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
                                <input class="form-control" name="fechaini_ident" type="date">
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
                                <input class="form-control" name="fechafin_ident" type="date">
                                </input>
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