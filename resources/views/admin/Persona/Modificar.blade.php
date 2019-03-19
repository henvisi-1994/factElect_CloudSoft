
@extends('admin.layouts.compras')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificar Persona</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{asset('updatePersona/'.$persona->id_per)}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Documento Personal</label>
                  <input type="text" name="doc_per"  value="{{$persona->doc_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Identificacion">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Organizacion Persona</label>
                  <input type="text" name="organiz_per" value="{{$persona->organiz_per}}"class="form-control" id="exampleInputEmail1" placeholder="Ingrese Organizacion">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Persona</label>
                  <input type="text" name="nombre_per" value="{{$persona->nombre_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido Persona</label>
                  <input type="text" name="apel_per" value="{{$persona->apel_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Apellido">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Telefono 1 </label>
                  <input type="text" name="fono1_per" value="{{$persona->fono1_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Teléfono 1">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Telefono 2 </label>
                  <input type="text" name="fono2_per"  value="{{$persona->fono2_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Teléfono 2">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Celular 1 </label>
                  <input type="text" name="cel1_per" value="{{$persona->cel1_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Celular 1">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Celular 2 </label>
                  <input type="text" name="cel2_per" value="{{$persona->cel2_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Celular 2">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Correo Personal </label>
                  <input type="text" name="correo_per" value="{{$persona->correo_per}}" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Correo Personal">
                </div>

                 <div class="form-group">
                  <label>Direccion</label>
                  <textarea class="form-control" rows="3"  name="direc_per" placeholder="Ingrese Direccion">{{$persona->direc_per}}</textarea>
                  
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_per" >
                    <option value="{{$persona->estado_per}}" selected="">Selecione Estado</option>
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
                   <input type="text" class="form-control" name="fechaini_per" value="{{$persona->fechaini_per}}" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->

                <div class="form-group">
                <label>Fecha Nacimiento:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="fecnac_per" value="{{$persona->fecnac_per}}" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->

              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="fechafin_per" value="{{$persona->fechafin_per}}" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Ciudad</label>
                  <select class="form-control" name="id_ciu">
                    <option value="{{$persona->id_ciu}}" selected="">Selecione una Ciudad</option>
                    @foreach($ciudades as $ciudad)
                    <option value="{{$ciudad->id_ciu}}">{{$ciudad->nomb_ciu}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Identificacion</label>
                  <select class="form-control" name="id_ident">
                    <option value="{{$persona->id_ident}}" selected="">Selecione una Identificacion</option>
                     @foreach($identificaciones as $identificacion)
                    <option value="{{$identificacion->id_ident}}">{{$identificacion->sri_ident}}</option>
                    @endforeach
                  </select>
                </div>

                 </div>
                 <div class="form-group">
                  <label>Contribuyente</label>
                  <select class="form-control" name="id_contrib">
                    <option value="{{$persona->id_contrib}}"  selected="">Selecione un Contribuyente</option>
                     @foreach($tipoContribuyentes as $contribuyente)
                    <option value="{{$contribuyente->id_contrib}}">{{$contribuyente->nomb_contrib}}</option>
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