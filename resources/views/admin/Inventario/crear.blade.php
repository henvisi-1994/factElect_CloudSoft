<form method="POST" v-on:submit.prevent="createInventario">
    <div class="modal fade" id="crearInventario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Añadir Inventario
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>
                                Empresa
                            </label>
                            <select class="form-control" name="id_emp" v-model="newInventario.id_emp">
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
                                Producto
                            </label>
                            <select class="form-control" name="id_emp" v-model="newInventario.id_prod">
                                <option disabled="" selected="" value="none">
                                    Selecione un Producto
                                </option>
                                @foreach($productos as $producto)
                                <option value="{{$producto->id_prod}}">
                                    {{$producto->descripcion_prod}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Periodo
                            </label>
                            <select class="form-control" name="id_fec" v-model="newInventario.id_fec">
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Número de Productos en Inventario
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="num_prod_inv" placeholder="Ingrese Numero " type="text" v-model="newInventario.numprod_inv">
                            </input>
                        </div>

                        <div class="form-group">
                            <label>
                                Observacion
                            </label>
                            <textarea class="form-control" name="observ_inv" placeholder="Ingrese Observación" rows="3" v-model="newInventario.observ_inv">
                            </textarea >
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_inv" v-model="newInventario.estado_inv">
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
                                Fecha Final:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control" name="fechafin_inv" type="date" v-model="newInventario.fechafin_inv">
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
