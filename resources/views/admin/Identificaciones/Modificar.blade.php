@extends('admin.layouts.app')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Identificación</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{asset('updateIdentificaciones/'.$identificacion->id_ident)}}">
              <div class="box-body">
                 </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control"name="sri_ident">
                    <option value="{{$identificacion->sri_ident}}" selected="">Selecione Identificación</option>
                    <option value="N">Natural</option>
                     <option value="J">Juridica</option>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3" value = "{{$identificacion->descrip_ident}}"  placeholder="Ingrese Descripción"name="descrip_ident">{{$identificacion->descrip_ident}}</textarea>
                </div>
                <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3" value = "{{$identificacion->observ_ident}}" placeholder="Ingrese Observación"name="observ_ident">{{$identificacion->observ_ident}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control"name="estado_ident">
                    <option value="{{$identificacion->estado_ident}}" selected="">Selecione Estado</option>
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
                  <input type="date" class="form-control" name="fechaini_ident" value="{{$identificacion->fechaini_ident}}">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_ident" value="{{$identificacion->fechafin_ident}}">
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
