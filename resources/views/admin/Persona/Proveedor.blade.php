
@extends('admin.layouts.app')
@section('content')
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos Personales</h3>
            </div>
           @if ($errors->count())
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif </br> 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/storePersona">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Documento Personal</label>
                  <input type="text" name="doc_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Identificacion">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Organizacion Persona</label>
                  <input type="text" name="organiz_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Organizacion">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Persona</label>
                  <input type="text" name="nombre_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido Persona</label>
                  <input type="text" name="apel_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Apellido">
                </div>

                

              <div class="form-group">
                <label>Telefono 1</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="fono1_per" class="form-control" data-inputmask='"mask": "(+999) 99 9999999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>

                <div class="form-group">
                <label>Telefono 2</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="fono2_per" class="form-control" data-inputmask='"mask": "(+999) 99 9999999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>


                <div class="form-group">
                <label>Celular 1</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="cel1_per" class="form-control" data-inputmask='"mask": "9999999999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>

                <div class="form-group">
                <label>Celular 2</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="cel2_per" class="form-control" data-inputmask='"mask": "9999999999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>
               

                 <div class="form-group">
                  <label for="exampleInputEmail1">Correo Personal </label>
                 <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="correo_per" class="form-control" placeholder="Ingrese Correo Personal">
                </div>
                </div>

                


                 <div class="form-group">
                  <label>Direccion</label>
                  <textarea class="form-control" rows="3"  name="direc_per" placeholder="Ingrese Direccion"></textarea>
                </div>
                 <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="estado_per" >
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
                   <input type="date" class="form-control" name="fechaini_per">
                </div>
                <!-- /.input group -->

                <div class="form-group">
                <label>Fecha Nacimiento:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fecnac_per">
                </div>
                <!-- /.input group -->

              </div>
              <div class="form-group">
                <label>Fecha Final:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="fechafin_per">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Ciudad</label>
                  <select class="form-control" name="id_ciu">
                    <option value="none" selected="" disabled="">Selecione una Ciudad</option>
                    @foreach($ciudades as $ciudad)
                    <option value="{{$ciudad->id_ciu}}">{{$ciudad->nomb_ciu}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Identificacion</label>
                  <select class="form-control" name="id_ident">
                    <option value="none" selected="" disabled="">Selecione una Identificacion</option>
                     @foreach($identificaciones as $identificacion)
                    <option value="{{$identificacion->id_ident}}">{{$identificacion->sri_ident}}</option>
                    @endforeach
                  </select>
                </div>

                 </div>
                 <div class="form-group">
                  <label>Contribuyente</label>
                  <select class="form-control" name="id_contrib">
                    <option value="none" selected="" disabled="">Selecione un Contribuyente</option>
                     @foreach($tipoContribuyentes as $contribuyente)
                    <option value="{{$contribuyente->id_contrib}}">{{$contribuyente->nomb_contrib}}</option>
                    @endforeach
                  </select>
                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Siguente</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
            </form>
          </div>
@endsection