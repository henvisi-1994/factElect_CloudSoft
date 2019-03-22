@extends('admin.layouts.compras')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Producto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addProducto')}}">
                Crear
            </a>
        </div>
        <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Imagen</th>
                  <th>Descripcion</th>
                  <th>Marca</th>
                  <th>Precio</th>
                  <th>Presentación</th>
                  <th>Stock</th>
                  <th>Fecha Elaboracion</th>
                  <th>Fecha Caducidad</th>
                  <th>IVA</th>
                  <th>ICE</th>
                  <th>Comision</th>
                  <th>Observacion</th>
                  <th>Estado</th>
                  <th>Configuración</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($productos as $producto)
                <tr>
                  <td>{{$producto->codigo_prod}}</td>
                  <td><img src="{{asset('/img/producto/'.$producto->imagen_prod)}}" alt="" />
                  </td>
                  <td>{{$producto->descripcion_prod}}</td>
                  <td>{{$producto->nomb_marca}}</td>
                  <td>{{$producto->precio_prod}}</td>
                   <td>{{$producto->present_prod}}</td>
                  <td>Minimo: {{$producto->stockmin_prod}} Maximo: {{$producto->stockmax_prod}}</td>
                  <td>{{$producto->fechaelab_prod}}</td>
                   <td>{{$producto->fechacad_prod}}</td>
                  <td>{{$producto->aplicaiva_prod}}</td>
                  <td>{{$producto->aplicaice_prod}}</td>
                   <td>{{$producto->comision_prod}}</td>
                  <td>{{$producto->observ_prod}}</td>
                  <td>{{$producto->estado_prod}}</td>
                    <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateProducto/'.$producto->id_prod)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  <a data-toggle="tooltip" title="Trash" class="pd-setting-ed btn btn-danger" href="#"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endsection