<form method="POST" v-on:submit.prevent="updateProvincia(fillProvincia.id_prov)">
    <div class="modal fade" id="editProvincia">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Modificar Provincia
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
                            <input class="form-control" id="exampleInputEmail1" name="nomb_prov" placeholder="Ingrese Nombre" type="text" v-model="fillProvincia.nomb_prov">
                            </input>
                        </div>

                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_prov" v-model="fillProvincia.estado_prov">
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
                                País
                            </label>
                            <select class="form-control" name="id_pais" v-model="fillProvincia.id_pais">
                                <option disabled="" selected="" value="none">
                                    Selecione un País
                                </option>
                                @foreach($paises as $pais)
                                <option value="{{$pais->id_pais}}">
                                    {{$pais->nomb_pais}}
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

