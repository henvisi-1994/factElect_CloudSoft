@extends('admin.layouts.app')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Proveedor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{asset('updateProveedor/'.$proveedor->id_prov)}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Codigo</label>
                  <input type="text" name="cod_prov" class="form-control" id="exampleInputEmail1" value="{{$proveedor->cod_prov}}" placeholder="Ingrese Nombre">
                </div>
                 <div class="form-group">
                  <label>Observacion</label>
                  <textarea class="form-control" rows="3"  name="obser_prov" placeholder="Ingrese Observación">{{$proveedor->obser_prov}}</textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_prov" >
                    <option value="{{$proveedor->estado_prov}}" selected="" >Selecione Estado</option>
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
                 <input type="text" class="form-control" name="fechaini_prov"  value="{{$proveedor->fechaini_prov}}"data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="fechafin_prov"  value="{{$proveedor->fechafin_prov}}"data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Empresa</label>
                  <select class="form-control" name="id_emp">
                    <option value="{{$proveedor->id_emp}}" selected="">Selecione una Empresa</option>
                    @foreach($empresas as $empresa)
                    <option value="{{$empresa->id_emp}}">{{$empresa->nombre_emp}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Periodo</label>
                  <select class="form-control" name="id_fec">
                    <option value="{{$proveedor->id_fec}}" selected="">Selecione una Periodo</option>
                     @foreach($fechas as $periodo)
                    <option value="{{$periodo->id_fec}}">{{$periodo->nomb_fec}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Persona</label>
                  <select class="form-control" name="id_per">
                    <option value="{{$proveedor->id_per}}"  selected="">Selecione una Persona</option>
                     @foreach($personas as $persona)
                    <option value="{{$persona->id_per}}">{{$persona->nombre_per}} {{$persona->apel_per}}</option>
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