@extends('admin.layouts.compras')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proveedor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                      <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addProveedor')}}">
                Crear
            </a>
        </div>
        <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Observación</th>
                  <th>Estado</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Empresa</th>
                  <th>Periodo</th>
                  <th>Persona</th>
                  <th>Configuración</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($proveedores as $proveedor)
                <tr>
                  <td>{{$proveedor->cod_prov}}</td>
                  <td>{{$proveedor->obser_prov}}</td>
                  <td>{{$proveedor->estado_prov}}</td>
                  <td>{{$proveedor->fechaini_prov}}</td>
                  <td>{{$proveedor->fechafin_prov}}</td>
                  <td>{{$proveedor->nombre_emp}}</td>
                  <td>{{$proveedor->nomb_fec}}</td>
                  <td>{{$proveedor->nombre_per}} {{$proveedor->apel_per}}</td>
                  <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateProveedor/'.$proveedor->id_prov)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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