<form action="storeProducto" enctype="multipart/form-data" method="POST">
    <div class="modal fade" id="crearProducto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Añadir Producto
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Codigo
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="codigo_prod" placeholder="Ingrese Nombre " type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Observacion
                            </label>
                            <textarea class="form-control" name="observ_prod" placeholder="Ingrese Observación" rows="3">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Codigo de Barras
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="codbarra_prod" placeholder="Ingrese Nombre " type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="descripcion_prod" placeholder="Ingrese Observación" rows="3">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                Marca
                            </label>
                            <select class="form-control" name="id_marca">
                                <option disabled="" selected="" value="none">
                                    Selecione una Marca
                                </option>
                                @foreach($marcas as $marca)
                                <option value="{{$marca->id_marca}}">
                                    {{$marca->nomb_marca}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Periodo
                            </label>
                            <select class="form-control" name="id_fec">
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
                            <label>
                                Empresa
                            </label>
                            <select class="form-control" name="id_emp">
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
                            <label for="exampleInputEmail1">
                                Presentacion
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="present_prod" placeholder="Ingrese Presentación " type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Precio
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-dollar">
                                    </i>
                                </span>
                                <input class="form-control" name="precio_prod" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Ubicación
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="ubicacion_prod" placeholder="Ingrese Ubicación " type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Stock Minimo
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="stockmin_prod" placeholder="Ingrese Stock minimo " type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Stock Maximo
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="stockmax_prod" placeholder="Ingrese Stock Maximo " type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha de Ingreso:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control" name="fechaing_prod" type="date">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha de Elaboración:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control"name="fechaelab_prod" type="date">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha de caducidad:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control" name="fechacad_prod" type="date">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Iva
                            </label>
                            <select class="form-control" name="aplicaiva_prod">
                                <option disabled="" selected="" value="none">
                                    ¿Aplica IVA?
                                </option>
                                <option value="S">
                                    SI
                                </option>
                                <option value="N">
                                    NO
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                ICE
                            </label>
                            <select class="form-control" name="aplicaice_prod">
                                <option disabled="" selected="" value="none">
                                    ¿Aplica ICE?
                                </option>
                                <option value="S">
                                    SI
                                </option>
                                <option value="N">
                                    NO
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Utilidad
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-dollar">
                                    </i>
                                </span>
                                <input class="form-control" name="util_prod" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Comisión
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-dollar">
                                    </i>
                                </span>
                                <input class="form-control" name="comision_prod" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-group files">
                            <label>
                                Imagen
                            </label>
                            <input class="form-control" multiple="" name="imagen_prod" type="file">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_prod">
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
                                <input class="form-control"name="fechaini_prod" type="date">
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
                                <input class="form-control" name="fechafin_prod" type="date">
                                </input>
                            </div>
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