<form method="POST" v-on:submit.prevent="createBodega">
    <div class="modal fade" id="crearBodega">
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
                            <input class="form-control"  name="nombre_bod" placeholder="Ingrese Nombre" type="text" v-model="newbodega.nombre_bod">
                            </input>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Teléfono
                            </label>
                            <input class="form-control"  name="telef_bod" placeholder="Ingrese Número de Teléfono" type="text" v-model="newbodega.telef_bod">
                            </input>
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">
                                Célular
                            </label>
                            <input class="form-control"  name="cel_bod" placeholder="Ingrese Número de Célular" type="text" v-model="newbodega.cel_bod">
                            </input>
                        </div>


                         <div class="form-group">
                            <label for="exampleInputEmail1">
                                Contacto
                            </label>
                            <input class="form-control"  name="nomb_contac_bod" placeholder="Ingrese Nombre de Contacto" type="text" v-model="newbodega.nomb_contac_bod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Dirección
                            </label>
                            <textarea class="form-control" name="direcc_bod" placeholder="Ingrese Dirección" rows="3" v-model="newbodega.direcc_bod">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_bod" v-model="newbodega.estado_bod">
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
                            <input class="form-control" name="fechaini_bod" type="date" v-model="newbodega.fechaini_bod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_bod" type="date" v-model="newbodega.fechafin_bod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                País
                            </label>
                            <select class="form-control" name="id_pais" v-model="newbodega.id_pais">
                                <option disabled="" selected="" value="none">
                                    Seleccione un País
                                </option>
                                @foreach($paises as $pais)
                                <option value="{{$pais->id_pais}}">
                                    {{$pais->nomb_pais}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Provincia
                            </label>
                            <select class="form-control" name="id_prov" v-model="newbodega.id_prov">
                                <option disabled="" selected="" value="none">
                                    Seleccione una Provincia
                                </option>
                                @foreach($provincias as $provincia)
                                <option value="{{$provincia->id_prov}}">
                                    {{$provincia->nomb_prov}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                         <div class="form-group">
                            <label>
                                Ciudad
                            </label>
                            <select class="form-control" name="id_ciu" v-model="newbodega.id_ciu">
                                <option disabled="" selected="" value="none">
                                    Seleccione una Ciudad
                                </option>
                                @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->id_ciu}}">
                                    {{$ciudad->nomb_ciu}}
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

