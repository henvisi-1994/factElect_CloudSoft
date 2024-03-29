<form method="POST" v-on:submit.prevent="createPersonaCliente">
   <div class="modal fade" id="crearPersonaCli">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button class="close" data-dismiss="modal" type="button">
               <span>
               ×
               </span>
               </button>
               <h4>
                  Añadir Cliente
               </h4>
               <span class="text-danger" v-for="error in errors">
               @{{ error }}
               </span>
            </div>
            <div class="modal-body">
               <div class="panel with-nav-tabs panel-primary">
                  <div class="panel-heading">
                     <ul class="nav nav-tabs">
                        <li class="active">
                           <a data-toggle="tab" href="#nav-formulario">
                           Datos Personales
                           </a>
                        </li>
                        <li>
                           <a data-toggle="tab" href="#nav-periodo">
                           Datos de Cliente
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade in active" id="nav-formulario">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Documento Personal</label>
                              <input type="text" name="doc_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Identificacion" v-model="newPersona.doc_per">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Organizacion Persona</label>
                              <input type="text" name="organiz_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Organizacion" v-model="newPersona.organiz_per">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Nombre Persona</label>
                              <input type="text" name="nombre_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre" v-model="newPersona.nombre_per">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Apellido Persona</label>
                              <input type="text" name="apel_per" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Apellido" v-model="newPersona.apel_per">
                           </div>
                           <div class="form-group">
                              <label>Telefono 1</label>
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <input type="text" name="fono1_per" class="form-control" placeholder= "(+999) 99 9999999" v-model="newPersona.fono1_per">
                              </div>
                              <!-- /.input group -->
                           </div>
                           <div class="form-group">
                              <label>Telefono 2</label>
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <input type="text" name="fono2_per" class="form-control" placeholder="(+999) 99 9999999" v-model="newPersona.fono2_per">
                              </div>
                              <!-- /.input group -->
                           </div>
                           <div class="form-group">
                              <label>Celular 1</label>
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <input type="text" name="cel1_per" class="form-control" placeholder = "9999999999" v-model="newPersona.cel1_per">
                              </div>
                              <!-- /.input group -->
                           </div>
                           <div class="form-group">
                              <label>Celular 2</label>
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <input type="text" name="cel2_per" class="form-control" placeholder = "9999999999" v-model="newPersona.cel2_per">
                              </div>
                              <!-- /.input group -->
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Correo Personal </label>
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                 <input type="email" name="correo_per" class="form-control" placeholder="Ingrese Correo Personal" v-model="newPersona.correo_per">
                              </div>
                           </div>
                           <div class="form-group">
                              <label>Direccion</label>
                              <textarea class="form-control" rows="3"  name="direc_per" placeholder="Ingrese Direccion" v-model="newPersona.direc_per"></textarea>
                           </div>
                           <div class="form-group">
                              <label>Estado</label>
                              <select class="form-control" name="estado_per" v-model="newPersona.estado_per" >
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
                                 <input type="date" class="form-control" name="fechaini_per" v-model="newPersona.fechaini_per">
                              </div>
                              <!-- /.input group -->
                              <div class="form-group">
                                 <label>Fecha Nacimiento:</label>
                                 <div class="input-group date">
                                    <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control" name="fecnac_per"  v-model="newPersona.fecnac_per">
                                 </div>
                                 <!-- /.input group -->
                              </div>
                              <div class="form-group">
                                 <label>Fecha Final:</label>
                                 <div class="input-group date">
                                    <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control" name="fechafin_per" v-model="newPersona.fechafin_per">
                                 </div>
                                 <!-- /.input group -->
                              </div>
                              <div class="form-group">
                                 <label>Ciudad</label>
                                 <select class="form-control" name="id_ciu" v-model="newPersona.id_ciu">
                                    <option value="none" selected="" disabled="">Selecione una Ciudad</option>
                                    @foreach($ciudades as $ciudad)
                                    <option value="{{$ciudad->id_ciu}}">{{$ciudad->nomb_ciu}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Identificacion</label>
                                 <select class="form-control" name="id_ident" v-model="newPersona.id_ident">
                                    <option value="none" selected="" disabled="">Selecione una Identificacion</option>
                                    @foreach($identificaciones as $identificacion)
                                    <option value="{{$identificacion->id_ident}}">{{$identificacion->sri_ident}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>Contribuyente</label>
                              <select class="form-control" name="id_contrib" v-model="newPersona.id_contrib">
                                 <option value="none" selected="" disabled="">Selecione un Contribuyente</option>
                                 @foreach($tipoContribuyentes as $contribuyente)
                                 <option value="{{$contribuyente->id_contrib}}">{{$contribuyente->nomb_contrib}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="nav-periodo">
                        <div class="box-body">
                           <div class="form-group">
                              <label for="exampleInputEmail1">
                              Código
                              </label>
                              <input class="form-control" id="exampleInputEmail1" name="cod_cli" placeholder="Ingrese Código" type="text" v-model="newCliente.cod_cli">
                              </input>
                           </div>
                           <div class="form-group">
                              <label>
                              Observación
                              </label>
                              <textarea class="form-control" name="observ_cli" placeholder="Ingrese Observación" rows="3" v-model="newCliente.observ_cli">
                              </textarea>
                           </div>
                           <div class="form-group">
                              <label>
                              Estado
                              </label>
                              <select class="form-control" name="estado_cli" v-model="newCliente.estado_cli">
                                 <option disabled="" selected="" value="none">
                                    Seleccione Estado
                                 </option>
                                 <option value="A">
                                    Activo
                                 </option>
                                 <option value="P">
                                    Pendiente
                                 </option>
                                 <option value="I">
                                    Inactivo
                                 </option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>
                              Fecha Inicial:
                              </label>
                              <input class="form-control" name="fechaini_cli" type="date" v-model="newCliente.fechaini_cli">
                              </input>
                           </div>
                           <div class="form-group">
                              <label>
                              Fecha Final:
                              </label>
                              <input class="form-control" name="fechafin_cli" type="date" v-model="newCliente.fechafin_cli">
                              </input>
                           </div>
                           <div class="form-group">
                              <label>
                              Empresa
                              </label>
                              <select class="form-control" name="id_emp" v-model="newCliente.id_emp">
                                 <option disabled="" selected="" value="none">
                                    Seleccione una Empresa
                                 </option>
                                 @foreach($empresas as $empresa)
                                 <option value="{{$empresa->id_emp}}">
                                    {{$empresa->nombre_emp}}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group">
                              <label>
                              Periodo
                              </label>
                              <select class="form-control" name="id_fec" v-model="newCliente.id_fec">
                                 <option disabled="" selected="" value="none">
                                    Seleccione un Periodo
                                 </option>
                                 @foreach($fechas as $fecha)
                                 <option value="{{$fecha->id_fec}}">
                                    {{$fecha->nomb_fec}}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <input name="_token" type="hidden" value="{{ csrf_token() }}">
                           </input>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                            </input>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
               </div>
            </div>
         </div>
      </div>
   </div>
</form>


























