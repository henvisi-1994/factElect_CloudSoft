@extends('admin.layouts.app')
@section('content')
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Persona</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Documento</th>
                  <th>Organizacion</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Direccion</th>
                  <th>Telefono1</th>
                  <th>Telefono2</th>
                  <th>Celular1</th>
                  <th>Celular2</th>
                  <th>FechaNacimiento</th>
                  <th>Correo</th>
                  <th>Estado</th>
                  <th>FechaInicial</th>
                  <th>FechaFin</th>
                  <th>Contribuyente</th>
                  <th>Ciudad</th>
                  <th>Identificacion</th>
                  <th>Configuración</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($persona as $personas)
                <tr>
                  <td>{{$personas->doc_per}}</td>
                  <td>{{$personas->organiz_per}}
                  </td>
                  <td>{{$personas->nombre_per}}</td>
                  <td>{{$personas->apel_per}}</td>
                  <td>{{$personas->direc_per}}</td>
                  <td>{{$personas->fono1_per}}</td>
                  <td>{{$personas->fono2_per}}</td>
                  <td>{{$personas->cel1_per}}</td>
                  <td>{{$personas->cel2_per}}</td>
                  <td>{{$personas->fecnac_per}}</td>
                  <td>{{$personas->correo_per}}</td>
                  <td>{{$personas->estado_per}}</td>
                  <td>{{$personas->fechaini_per}}</td>
                  <td>{{$personas->fechafin_per}}</td>
                  <td>{{$personas->nomb_contrib}}</td>
                  <td>{{$personas->nomb_ciu}}</td>
                  <td>{{$personas->sri_ident}}</td>
                  <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdatePersona/'.$personas->id_per)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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