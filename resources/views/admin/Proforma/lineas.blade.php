<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <a class="btn btn-primary pull-left" data-target="#addProducto" data-toggle="modal" href="#">
            Añadir Producto
        </a>
        <br/>
        <table class="table table-hover table-striped">
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
                        Neto
                    </th>
                    <th>
                        IVA
                    </th>
                    <th>
                        Total
                    </th>
                    <th>
                        Configuración
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="detalle in detallefactura">
                    <td>
                        @{{detalle.codigo_prod}}
                    </td>
                    <td>
                        <div class="container-fluid">
                            <div class="col-xs-4 col-md-4">
                                <input class="form-control" id="example-number-input" type="number" v-model="detalle.cantidad" value="1"/>
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <a class="pd-setting-ed btn btn-warning" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="cambiarCantidad(detalle)">
                                    <i aria-hidden="true" class="fa fa-refresh">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        @{{detalle.descripcion}}
                    </td>
                    <td>
                        @{{detalle.precio_prod}}
                    </td>
                    <td>
                        @{{detalle.descuento}}
                    </td>
                    <td>
                        @{{detalle.neto}}
                    </td>
                    <td>
                        <div v-if="detalle.aplicaiva_prod == 'S'">
                            <span class="label label-success">
                                12%
                            </span>
                        </div>
                        <div v-else-if="detalle.aplicaiva_prod == 'N'">
                            <span class="label label-warning">
                                0%
                            </span>
                        </div>
                    </td>
                    <td>
                        @{{detalle.total}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deletedetalleFact(detalle)">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>
                        Subtotal
                    </th>
                    <th>
                        Subtotal IVA
                    </th>
                    <th>
                        Total
                    </th>
                </tr>
                <tr>
                    <th>
                        @{{subtotal}}
                    </th>
                    <th>
                        @{{subtotalIva}}
                    </th>
                    <th>
                        @{{total}}
                    </th>
                </tr>
            </tfoot>
        </table>
        @include('admin.FacturaVenta.addProducto')
    </div>
</div>
