@extends('admin.layouts.compras')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tipo de Contribuyente</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addTipoContribuyente')}}">
                Crear
            </a>
        </div>
        <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Observación</th>
                  <th>Estado</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Configuración</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($tiposContribuyentes as $tipoContribuyente)
                <tr>
                  <td>{{$tipoContribuyente->nomb_contrib}}</td>
                  <td>{{$tipoContribuyente->obser_contrib}}
                  </td>
                  <td>{{$tipoContribuyente->estado_contrib}}</td>
                  <td>{{$tipoContribuyente->fechaini_contrib}}</td>
                  <td>{{$tipoContribuyente->fechafin_contrib}}</td>
                    <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateTipoContribuyente/'.$tipoContribuyente->id_contrib)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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