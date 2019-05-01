<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Producto
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="overflow-x: auto">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearProducto" data-toggle="modal" href="#">
                Crear
            </a>
        </div>
        <br>
        </br>
        <div class="container-fluid">
            <div class="col-xs-2 col-md-2">
                <label for="exampleInputEmail1">
                    Buscar:
                </label>
                <input id="exampleInputEmail1" name="buscar_cat" placeholder="Ingrese Nombre" type="text" v-model="buscar_prod">
                </input>
            </div>
            <div class="col-xs-2 col-md-2 form-group">
                <label>
                    Marca
                </label>
                <select class="form-control" name="id_marca" v-model="buscar_marca">
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
             <div class="col-xs-2 col-md-2 form-group">
                <label>
                    Categoria
                </label>
                <select class="form-control" name="id_marca" v-model="buscar_categoria">
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
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Codigo
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Precio
                    </th>
                    <th>
                        Presentación
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Fecha Elaboracion
                    </th>
                    <th>
                        Fecha Caducidad
                    </th>
                    <th>
                        IVA
                    </th>
                    <th>
                        ICE
                    </th>
                    <th>
                        Comision
                    </th>
                    <th>
                        Observacion
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Configuración
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in buscarProducto">
                    <td>
                        @{{producto.codigo_prod}}
                    </td>
                    <td>
                        @{{producto.descripcion_prod}}
                    </td>
                    <td>
                        @{{producto.nomb_marca}}
                    </td>
                    <td>
                        @{{producto.precio_prod}}
                    </td>
                    <td>
                        @{{producto.present_prod}}
                    </td>
                    <td>
                        Minimo: @{{producto.stockmin_prod}} Maximo: @{{producto.stockmax_prod}}
                    </td>
                    <td>
                        @{{producto.fechaelab_prod}}
                    </td>
                    <td>
                        @{{producto.fechacad_prod}}
                    </td>
                    <td>
                        @{{producto.aplicaiva_prod}}
                    </td>
                    <td>
                        @{{producto.aplicaice_prod}}
                    </td>
                    <td>
                        @{{producto.comision_prod}}
                    </td>
                    <td>
                        @{{producto.observ_prod}}
                    </td>
                    <td>
                        <div v-if="producto.estado_prod == 'A'">
                            <span class="label label-success">
                                Activo
                            </span>
                        </div>
                        <div v-else-if="producto.estado_prod == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="producto.estado_prod == 'I'">
                            <span class="label label-danger">
                                Inactivo
                            </span>
                        </div>
                        <div v-else="">
                            <span class="label label-warning">
                                En proceso
                            </span>
                        </div>
                    </td>
                    <td width="150">
                        <a class="pd-setting-ed btn btn-primary" data-toggle="tooltip" href="#" title="View" v-on:click.prevent="viewProducto(producto)">
                            <i aria-hidden="true" class="fa fa-eye">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editProducto(producto)">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteProducto(producto)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Producto.Crear')
        @include('admin.Producto.Modificar')
        @include('admin.Producto.Ver')
    </div>
</div>
