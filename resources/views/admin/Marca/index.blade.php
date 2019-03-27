 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Marca</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addMarca')}}">
                Crear
            </a>
        </div>
        <br>
              <table id="example5" class="table table-bordered table-striped">
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
                  @foreach($marcas as $marca)
                <tr>
                  <td>{{$marca->nomb_marca}}</td>
                  <td>{{$marca->observ_marca}}
                  </td>
                  <td>{{$marca->estado_marca}}</td>
                  <td>{{$marca->fechaini_marca}}</td>
                  <td>{{$marca->fechafin_marca}}</td>
                    <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateMarca/'.$marca->id_marca)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  <a data-toggle="tooltip" title="Trash" class="pd-setting-ed btn btn-danger" href="#"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
