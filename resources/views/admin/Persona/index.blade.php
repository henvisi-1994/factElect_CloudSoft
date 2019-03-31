@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Persona
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addPersona')}}">
                Crear
            </a>
        </div>
        <br>
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>
                            Documento
                        </th>
                        <th>
                            Organizacion
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th>
                        <th>
                            Direccion
                        </th>
                        <th>
                            Telefono1
                        </th>
                        <th>
                            Celular1
                        </th>
                        <th>
                            Correo
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Contribuyente
                        </th>
                        <th>
                            Ciudad
                        </th>
                        <th>
                            Identificacion
                        </th>
                        <th>
                            Configuración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($persona as $personas)
                    <tr>
                        <td>
                            {{$personas->doc_per}}
                        </td>
                        <td>
                            {{$personas->organiz_per}}
                        </td>
                        <td>
                            {{$personas->nombre_per}}
                        </td>
                        <td>
                            {{$personas->apel_per}}
                        </td>
                        <td>
                            {{$personas->direc_per}}
                        </td>
                        <td>
                            {{$personas->fono1_per}}
                        </td>
                        <td>
                            {{$personas->cel1_per}}
                        </td>
                        <td>
                            {{$personas->correo_per}}
                        </td>
                        <td>
                            {{$personas->estado_per}}
                        </td>
                        <td>
                            {{$personas->nomb_contrib}}
                        </td>
                        <td>
                            {{$personas->nomb_ciu}}
                        </td>
                        <td>
                            {{$personas->sri_ident}}
                        </td>
                        <td>
                            <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="{{asset('preupdatePersona/'.$personas->id_per)}}" title="Edit">
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
        </br>
    </div>
</div>
<!-- /.box-body -->
@endsection
