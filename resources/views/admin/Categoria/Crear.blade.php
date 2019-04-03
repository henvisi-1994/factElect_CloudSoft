<form method="POST" v-on:submit.prevent="createCategoria">
<div class="modal fade" id="crearCategoria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
            </div>
            <div class="modal-body">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nomb_cat" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre"  v-model="newcategoria.nomb_cat">
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3"  name="observ_cat" placeholder="Ingrese Observación"  v-model="newcategoria.observ_cat"></textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_cat" v-model="newcategoria.estado_cat">
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
                  <input type="date" class="form-control" name="fechaini_cat" v-model="newcategoria.fechaini_cat"  >
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_cat" v-model="newcategoria.fechafin_cat" >
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Empresa</label>
                  <select class="form-control" name="id_emp" v-model="newcategoria.id_emp">
                    <option value="none" selected="" disabled="">Selecione una Empresa</option>
                    @foreach($empresas as $empresa)
                    <option value="{{$empresa->id_emp}}">{{$empresa->nombre_emp}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Periodo</label>
                  <select class="form-control" name="id_fec"  v-model="newcategoria.id_fec">
                    <option value="none" selected="" disabled="">Selecione una Periodo</option>
                     @foreach($fechas as $periodo)
                    <option value="{{$periodo->id_fec}}">{{$periodo->nomb_fec}}</option>
                    @endforeach
                  </select>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>
</form>
              


