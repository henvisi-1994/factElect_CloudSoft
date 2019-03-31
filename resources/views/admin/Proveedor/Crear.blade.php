@extends('admin.layouts.app')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Proveedor</h3>
            </div>
             @if ($errors->count())
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
            @endif </br> 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/storeProveedor">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Codigo</label>
                  <input type="text" name="cod_prov" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3"  name="obser_prov" placeholder="Ingrese Observación"></textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_prov" >
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
                 <input type="date" class="form-control" name="fechaini_prov">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_prov">
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
                 <div class="form-group">
                  <input type="hidden" name="id_per"  value= "{{$id_per}}" class="form-control" id="exampleInputEmail1">
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
            </form>
          </div>
@endsection