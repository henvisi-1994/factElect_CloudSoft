@extends('admin.layouts.app')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Identificaciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearIdentificaciones">
                Crear
            </a>
        </div>
        <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Identificación SRI</th>
                  <th>Descripción</th>
                  <th>Observación</th>
                  <th>Estado</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Configuración</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($identificacion as $identificaciones)
                <tr>
                  <td>{{$identificaciones->sri_ident}}</td>
                  <td>{{$identificaciones->descrip_ident}}
                  </td>
                  <td>{{$identificaciones->observ_ident}}</td>
                  <td>{{$identificaciones->estado_ident}}</td>
                  <td>{{$identificaciones->fechaini_ident}}</td>
                  <td>{{$identificaciones->fechafin_ident}}</td>
                    <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateIdentificaciones/'.$identificaciones->id_ident)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  <a data-toggle="tooltip" title="Trash" class="pd-setting-ed btn btn-danger" href="#"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
                      @include('admin.Identificaciones.Crear')
            </div>
            <!-- /.box-body -->
          </div>

@endsection