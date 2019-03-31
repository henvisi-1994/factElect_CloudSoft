@extends('admin.layouts.app')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Ciudad</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{asset('updateCiudad/'.$ciudad->id_ciu)}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nomb_ciu" value="{{$ciudad->nomb_ciu}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3"  name="observ_ciu" placeholder="Ingrese Observación">{{$ciudad->observ_ciu}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_ciu" >
                    <option value="{{$ciudad->estado_ciu}}"  selected="">Selecione Estado</option>
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
                  <input type="date" class="form-control" name="fechaini_ciu" value="{{$ciudad->fechaini_ciu}}">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_ciu" value="{{$ciudad->fechafin_ciu}}">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Empresa</label>
                  <select class="form-control" name="id_emp">
                    <option value="{{$ciudad->id_emp}}"  selected="">Selecione una Empresa</option>
                    @foreach($empresas as $empresa)
                    <option value="{{$empresa->id_emp}}">{{$empresa->nombre_emp}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Periodo</label>
                  <select class="form-control" name="id_fec">
                    <option value="{{$ciudad->id_fec}}" selected="">Selecione una Periodo</option>
                     @foreach($fechas as $periodo)
                    <option value="{{$periodo->id_fec}}">{{$periodo->nomb_fec}}</option>
                    @endforeach
                  </select>
                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
            </form>
          </div>
@endsection