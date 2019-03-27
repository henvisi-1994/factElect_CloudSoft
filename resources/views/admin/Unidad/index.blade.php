 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Unidad</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="box-body">
                      <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" href="{{asset('addUnidad')}}">
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
                  @foreach($unidades as $unidad)
                <tr>
                  <td>{{$unidad->nomb_unidad}}</td>
                  <td>{{$unidad->observ_unidad}}
                  </td>
                  <td>{{$unidad->estado_unidad}}</td>
                  <td>{{$unidad->fechaini_unidad}}</td>
                  <td>{{$unidad->fechafin_unidad}}</td>
                    <td>
                  <a data-toggle="tooltip" title="Edit" class="pd-setting-ed btn btn-success" href="{{asset('preupdateUnidad/'.$unidad->id_unidad)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  <a data-toggle="tooltip" title="Trash" class="pd-setting-ed btn btn-danger" href="#"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
