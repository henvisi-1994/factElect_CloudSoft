@extends('admin.layouts.compras')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificar Unidad</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"method="POST" action="{{asset('updateUnidad/'.$unidad->id_unidad)}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nomb_unidad" class="form-control" id="exampleInputEmail1" value = "{{$unidad->nomb_unidad}}" placeholder="Ingrese Nombre">
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3" placeholder="Ingrese Observación" name="observ_unidad">{{$unidad->observ_unidad}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_unidad">
                    <option value="{{$unidad->estado_unidad}}"selected="">Selecione Estado</option>
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
                  <input type="text" class="form-control pull-right" id="datepicker" placeholder="aaaa-mm-yyyy" value = "{{$unidad->fechaini_unidad}}" name="fechaini_unidad">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker"  placeholder="aaaa-mm-yyyy" value = "{{$unidad->fechafin_unidad}}" name="fechafin_unidad">
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