@extends('admin.layouts.app')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Tipo de Contribuyente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{asset('updateTipoContribuyente/'.$tiposContribuyentes->id_contrib)}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value = "{{$tiposContribuyentes->nomb_contrib}}" placeholder="Ingrese Nombre " name="nomb_contrib" >
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3" placeholder="Ingrese Observación"name="obser_contrib">{{$tiposContribuyentes->obser_contrib}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control"name="estado_contrib">
                    <option value="{{$tiposContribuyentes->estado_contrib}}"  selected="">Selecione Estado</option>
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
                  <input type="date" class="form-control" name="fechaini_contrib" value="{{$tiposContribuyentes->fechaini_contrib}}">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_contrib" value="{{$tiposContribuyentes->fechafin_contrib}}">
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