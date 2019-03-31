<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Categoria
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCategoria">
                Crear
            </a>
        </div>
        <br>
        <table class="table table-bordered table-striped" id="example3">
            <thead>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Observación
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Fecha Inicio
                    </th>
                    <th>
                        Fecha Fin
                    </th>
                    <th>
                        Empresa
                    </th>
                    <th>
                        Periodo
                    </th>
                    <th>
                        Configuración
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>
                        {{$categoria->nomb_cat}}
                    </td>
                    <td>
                        {{$categoria->observ_cat}}
                    </td>
                    <td>
                        {{$categoria->estado_cat}}
                    </td>
                    <td>
                        {{$categoria->fechaini_cat}}
                    </td>
                    <td>
                        {{$categoria->fechafin_cat}}
                    </td>
                    <td>
                        {{$categoria->nombre_emp}}
                    </td>
                    <td>
                        {{$categoria->nomb_fec}}
                    </td>
                    <td>
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="{{asset('preupdateCategoria/'.$categoria->id_cat)}}" title="Edit">
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
        @include('admin.Categoria.Crear')
    </div>
</div>
