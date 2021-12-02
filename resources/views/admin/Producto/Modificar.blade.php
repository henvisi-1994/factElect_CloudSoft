<form enctype="multipart/form-data" method="POST" v-on:submit.prevent="updateProducto(fillProducto.id_prod)">
    <div class="modal fade" id="editProducto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Modificar Productos
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                        @{{ error }}
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Codigo
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="codigo_prod" placeholder="Ingrese Nombre " type="text" v-model="fillProducto.codigo_prod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Observacion
                            </label>
                            <textarea class="form-control" name="observ_prod" placeholder="Ingrese Observación" rows="3" v-model="fillProducto.observ_prod">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Codigo de Barras
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="codbarra_prod" placeholder="Ingrese Nombre " type="text" v-model="fillProducto.codbarra_prod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea class="form-control" name="descripcion_prod" placeholder="Ingrese Observación" rows="3" v-model="fillProducto.descripcion_prod">
                            </textarea>
                        </div>
                         <div class="form-group">
                            <label>
                                Bodega
                            </label>
                            <select class="form-control" name="id_marca" v-model="fillProducto.id_bod">
                                <option disabled="" selected="" value="none">
                                    Selecione una Bodega
                                </option>
                                @foreach($bodegas as $bodega)
                                <option value="{{$bodega->id_bod}}">
                                    {{$bodega->nombre_bod}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Categoria
                            </label>
                            <select class="form-control" name="id_marca" v-model="fillProducto.id_cat">
                                <option disabled="" selected="" value="none">
                                    Selecione una Categoria
                                </option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id_cat}}">
                                    {{$categoria->nomb_cat}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Marca
                            </label>
                            <select class="form-control" name="id_marca" v-model="fillProducto.id_marca">
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
                            <select class="form-control" name="id_fec" v-model="fillProducto.id_fec">
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
                            <select class="form-control" name="id_emp" v-model="fillProducto.id_emp">
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
                            <input class="form-control" id="exampleInputEmail1" name="present_prod" placeholder="Ingrese Presentación " type="text" v-model="fillProducto.present_prod">
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
                                <input class="form-control" name="precio_prod" type="text" v-model="fillProducto.precio_prod">
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Ubicación
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="ubicacion_prod" placeholder="Ingrese Ubicación " type="text" v-model="fillProducto.ubicacion_prod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Stock Minimo
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="stockmin_prod" placeholder="Ingrese Stock minimo " type="text" v-model="fillProducto.stockmin_prod">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Stock Maximo
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="stockmax_prod" placeholder="Ingrese Stock Maximo " type="text" v-model="fillProducto.stockmax_prod">
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
                                <input class="form-control" name="fechaing_prod" type="date" v-model="fillProducto.fechaing_prod">
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
                                <input class="form-control" name="fechaelab_prod" type="date" v-model="fillProducto.fechaelab_prod">
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
                                <input class="form-control" name="fechacad_prod" type="date" v-model="fillProducto.fechacad_prod">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Iva
                            </label>
                            <select class="form-control" name="aplicaiva_prod" v-model="fillProducto.aplicaiva_prod">
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
                            <select class="form-control" name="aplicaice_prod" v-model="fillProducto.aplicaice_prod">
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
                                <input class="form-control" name="util_prod" type="text" v-model="fillProducto.util_prod">
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
                                <input class="form-control" name="comision_prod" type="text" v-model="fillProducto.comision_prod">
                                </input>
                            </div>
                        </div>
                        <div class="form-group files">
                            <label>
                                Imagen
                            </label>
                            <input class="form-control" multiple="" name="imagen_prod" type="file" v-on:change="getImagenProducto" >
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_prod" v-model="fillProducto.estado_prod">
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
                                <input class="form-control" name="fechaini_prod" type="date" v-model="fillProducto.fechaini_prod">
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
                                <input class="form-control" name="fechafin_prod" type="date" v-model="fillProducto.fechafin_prod">
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
