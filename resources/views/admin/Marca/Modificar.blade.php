@extends('admin.layouts.compras')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificar Marca</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{asset('updateMarca/'.$marca->id_marca)}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>marca
                  <input type="text" class="form-control" id="exampleInputEmail1" value = "{{$marca->nomb_marca}}"placeholder="Ingrese Nombre " name="nomb_marca" >
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3" placeholder="Ingrese Observación"name="observ_marca">{{$marca->observ_marca}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control"name="estado_marca">
                    <option value="{{$marca->estado_marca}}"  selected="">Selecione Estado</option>
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
                 <input type="text" class="form-control" name="fechaini_marca" value="{{$marca->fechaini_marca}}" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control" name="fechafin_marca" value="{{$marca->fechafin_marca}}" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
            </form>
          </div>
@endsection