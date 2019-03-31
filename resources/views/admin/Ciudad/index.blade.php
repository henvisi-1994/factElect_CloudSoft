@extends('admin.layouts.app')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ciudad</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCiudad">
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
                  <th>Empresa</th>
                  <th>Periodo</th>
                  <th>Configuración</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($ciudades as $ciudad)
                <tr>
                  <td>{{$ciudad->nomb_ciu}}</td>
                  <td>{{$ciudad->observ_ciu}}
                  </td>
                  <td>{{$ciudad->estado_ciu}}</td>
                  <td>{{$ciudad->fechaini_ciu}}</td>
                  <td>{{$ciudad->fechafin_ciu}}</td>
                  <td>{{$ciudad->nombre_emp}}</td>
                  <td>{{$ciudad->nomb_fec}}</td>
                  <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateCiudad/'.$ciudad->id_ciu)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  <a data-toggle="tooltip" title="Trash" class="pd-setting-ed btn btn-danger" href="#"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
                      @include('admin.Ciudad.Crear')
            </div>
            <!-- /.box-body -->
          </div>

@endsection