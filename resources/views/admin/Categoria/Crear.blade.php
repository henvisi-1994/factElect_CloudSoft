<form method="POST" action="storeCategoria">
  <div class="modal fade" id="crearCategoria">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Añadir Categoria
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                    </span>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nomb_cat" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3"  name="observ_cat" placeholder="Ingrese Observación"></textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_cat" >
                    <option value="none" selected="" disabled="">Selecione Estado</option>
                    <option value="A">Activo</option>
                     <option value="P">Pendiente</option>
                     <option value="I">Inactivo</option>
                  </select>
                </div>
                <div class="form-group">
                <label>Fecha Inicial:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechaini_cat">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_cat">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Empresa</label>
                  <select class="form-control" name="id_emp">
                    <option value="none" selected="" disabled="">Selecione una Empresa</option>
                    @foreach($empresas as $empresa)
                    <option value="{{$empresa->id_emp}}">{{$empresa->nombre_emp}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Periodo</label>
                  <select class="form-control" name="id_fec">
                    <option value="none" selected="" disabled="">Selecione una Periodo</option>
                     @foreach($fechas as $periodo)
                    <option value="{{$periodo->id_fec}}">{{$periodo->nomb_fec}}</option>
                    @endforeach
                  </select>
                </div>
              <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        </input>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Guardar">
                        </input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>