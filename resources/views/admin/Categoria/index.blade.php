@extends('admin.layouts.app')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categoria</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                  @foreach($categorias as $categoria)
                <tr>
                  <td>{{$categoria->nomb_cat}}</td>
                  <td>{{$categoria->observ_cat}}
                  </td>
                  <td>{{$categoria->estado_cat}}</td>
                  <td>{{$categoria->fechaini_cat}}</td>
                  <td>{{$categoria->fechafin_cat}}</td>
                  <td>{{$categoria->nombre_emp}}</td>
                  <td>{{$categoria->nomb_fec}}</td>
                  <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateCategoria/'.$categoria->id_cat)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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