<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Producto
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="overflow-x: auto">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addProducto')}}">
                Crear
            </a>
        </div>
        <br>
        <table class="table table-bordered table-striped" id="example1">
            <thead>
                <tr>
                    <th>
                            Codigo
                        </th>
                        <th>
                            Imagen
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
                @foreach($productos as $producto)
                <tr>
                        <td>
                            {{$producto->codigo_prod}}
                        </td>
                        <td>
                            <img alt="" src="{{asset('/img/producto/'.$producto->imagen_prod)}}"/>
                        </td>
                        <td>
                            {{$producto->descripcion_prod}}
                        </td>
                        <td>
                            {{$producto->nomb_marca}}
                        </td>
                        <td>
                            {{$producto->precio_prod}}
                        </td>
                        <td>
                            {{$producto->present_prod}}
                        </td>
                        <td>
                            Minimo: {{$producto->stockmin_prod}} Maximo: {{$producto->stockmax_prod}}
                        </td>
                        <td>
                            {{$producto->fechaelab_prod}}
                        </td>
                        <td>
                            {{$producto->fechacad_prod}}
                        </td>
                        <td>
                            {{$producto->aplicaiva_prod}}
                        </td>
                        <td>
                            {{$producto->aplicaice_prod}}
                        </td>
                        <td>
                            {{$producto->comision_prod}}
                        </td>
                        <td>
                            {{$producto->observ_prod}}
                        </td>
                        <td>
                            {{$producto->estado_prod}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="{{asset('preupdateProducto/'.$producto->id_prod)}}" title="Edit">
                                <i aria-hidden="true" class="fa fa-pencil-square-o">
                                </i>
                            </a>
                            <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
