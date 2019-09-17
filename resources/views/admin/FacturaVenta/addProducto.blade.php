<form action="preguardarFacturaVenta" method="POST">
    <div class="modal fade" id="addProducto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <i aria-hidden="true" class="fa fa-search">
                    </i>
                    <h4>
                        Selecione el Producto
                    </h4>
                    <p>
                        Busca y selecciona el producto.
                    </p>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="container-fluid">
                            <div class="col-xs-4 col-md-4">
                                <label for="exampleInputEmail1">
                                    Buscar:
                                </label>
                                <input id="exampleInputEmail1" name="buscar_cat" placeholder="Ingrese Nombre" type="text" v-model="buscar_prod">
                                </input>
                            </div>
                            <div class="col-xs-4 col-md-4 form-group">
                                <label>
                                    Marca
                                </label>
                                <select class="form-control" name="id_marca" v-model="buscar_id_marca">
                                    <option disabled="" selected="" value="none">
                                        Selecione una Marca
                                    </option>
                                    @foreach($marcas as $marca)
                                    <option value="{{$marca->nomb_marca}}">
                                        {{$marca->nomb_marca}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-4 col-md-4 form-group">
                                <label>
                                    Categoria
                                </label>
                                <select class="form-control" name="id_marca" v-model="buscar_id_cat">
                                    <option disabled="" selected="" value="none">
                                        Selecione una Marca
                                    </option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->nomb_cat}}">
                                        {{$categoria->nomb_cat}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div v-if="buscar_prod">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Codigo
                                        </th>
                                        <th>
                                            Cantidad
                                        </th>
                                        <th>
                                            Descripción
                                        </th>
                                        <th>
                                            Precio Unitario
                                        </th>
                                        <th>
                                            Dto. %
                                        </th>
                                        <th>
                                            Añadir
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="producto in buscarProducto">
                                        <td>
                                            @{{producto.codigo_prod}}
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" value="1" id="example-number-input" v-model="cantidadP">
                                        </td>
                                        <td>
                                            @{{producto.descripcion_prod}}
                                        </td>
                                        <td>
                                            @{{producto.precio_prod}}
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            <a class="pd-setting-ed btn btn-primary" data-toggle="tooltip" href="#" title="Añadir" v-on:click.prevent="adddetalleFact(producto)">
                                                +
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>