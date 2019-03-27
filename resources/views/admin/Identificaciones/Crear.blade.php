@extends('admin.layouts.compras')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Identificación</h3>
            </div>
            <!-- /.box-header -->
             @if ($errors->count())
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif </br> 
            <!-- form start -->
            <form role="form" method="POST" action="/storeIdentificaciones">
              <div class="box-body">
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control"name="sri_ident">
                    <option value="none" selected="" disabled="">Selecione Identificación</option>
                    <option value="N">Natural</option>
                     <option value="J">Juridica</option>
                  </select>
                </div>
                <div class="form-group">
                 <div class="form-group">
                  <label>Descripción</label>
                  <textarea class="form-control" rows="3" placeholder="Ingrese Descripción"name="descrip_ident"></textarea>
                </div>
                <div class="form-group">
                  <label>Observación</label>
                  <textarea class="form-control" rows="3" placeholder="Ingrese Observación"name="observ_ident"></textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control"name="estado_ident">
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
                  <input type="text" class="form-control" name="fechaini_ident" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="fechafin_ident" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
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
