<form method="POST" v-on:submit.prevent="updateCategoria(fillCategoria.id_cat)">
    <div class="modal fade" id="editCategoria">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Modificar Categoria
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
                                <input class="form-control" id="exampleInputEmail1" name="nomb_cat" placeholder="Ingrese Nombre" type="text" v-model="fillCategoria.nomb_cat">
                                </input>
                            </div>
                            <div class="form-group">
                                <label>
                                    Observacion
                                </label>
                                <textarea class="form-control" name="observ_cat" placeholder="Ingrese Observación" rows="3" v-model="fillCategoria.observ_cat">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    Estado
                                </label>
                                <select class="form-control" name="estado_cat" v-model="fillCategoria.estado_cat">
                                    <option selected="">
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
                            <input class="form-control" name="fechaini_cat" type="date" v-model="fillCategoria.fechaini_cat">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_cat" type="date" v-model="fillCategoria.fechafin_cat">
                            </input>
                        </div>
                            <div class="form-group">
                                <label>
                                    Empresa
                                </label>
                                <select class="form-control" name="id_emp" v-model="fillCategoria.id_emp">
                                    <option selected="" >
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
                                <select class="form-control" name="id_fec" v-model="fillCategoria.id_fec">
                                    <option selected="">
                                        Selecione una Periodo
                                    </option>
                                    @foreach($fechas as $periodo)
                                    <option value="{{$periodo->id_fec}}">
                                        {{$periodo->nomb_fec}}
                                    </option>
                                    @endforeach
                                </select>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                </input>
                            </div>
                            <!-- /.box-body -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
