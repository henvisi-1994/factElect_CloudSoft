<form method="POST" v-on:submit.prevent="updateEmpresa(fillEmpresa.id_emp)">
    <div class="modal fade" id="editEmpresa">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>
                            ×
                        </span>
                    </button>
                    <h4>
                        Modificar Empresa
                    </h4>
                    <span class="text-danger" v-for="error in errors">
                        @{{ error }}
                    </span>
                </div>
                <div class="modal-body">
                        <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                totestab_emp
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="totestab_emp" placeholder="Ingrese totestab_emp de la empresa" type="text" v-model="fillEmpresa.totestab_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                RUC
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="rucempresa_emp" placeholder="Ingrese RUC de la empresa" type="text" v-model="fillEmpresa.rucempresa_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Razon Social
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="razon_emp" placeholder="Ingrese Razon Social" type="text" v-model="fillEmpresa.razon_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombre
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="nombre_emp" placeholder="Ingrese Nombre de la empresa" type="text" v-model="fillEmpresa.nombre_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Apellido
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="apellido_emp" placeholder="Ingrese apellido de representante de la empresa" type="text" v-model="fillEmpresa.apellido_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Contacto
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="contacto_emp" placeholder="Ingrese contacto de la empresa" type="text" v-model="fillEmpresa.contacto_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Direción
                            </label>
                             <textarea class="form-control" name="direcc_emp" placeholder="Ingrese Direcion" rows="3" v-model="fillEmpresa.direcc_emp">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Telefono
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="telefono_emp" placeholder="Ingrese número de Telefono" type="text" v-model="fillEmpresa.telefono_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Celular
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="celular_emp" placeholder="Ingrese número de Celular" type="text" v-model="fillEmpresa.celular_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Fax
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="fax_emp" placeholder="Ingrese número de fax" type="text" v-model="fillEmpresa.fax_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Email
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="email_emp" placeholder="Ingrese correo electronico" type="text" v-model="fillEmpresa.email_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Contador
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="contador_emp" placeholder="Ingrese nombre del contador de la empresa" type="text" v-model="fillEmpresa.contador_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Tipo de Contribuyente
                            </label>
                            <input class="form-control" id="exampleInputEmail1" name="tipcontrib_emp" placeholder="Ingrese tipo de contribuyente" type="text" v-model="fillEmpresa.tipcontrib_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Estado
                            </label>
                            <select class="form-control" name="estado_emp" v-model="fillEmpresa.estado_emp">
                                <option disabled="" selected="" value="none">
                                    Selecione Estado
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
                            <input class="form-control" name="fechaini_emp" type="date" v-model="fillEmpresa.fechaini_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input class="form-control" name="fechafin_emp" type="date" v-model="fillEmpresa.fechafin_emp">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Ciudad
                            </label>
                            <select class="form-control" name="id_ciu" v-model="fillEmpresa.id_ciu">
                                <option disabled="" selected="" value="none">
                                    Selecione una Ciudad
                                </option>
                                @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->id_ciu}}">
                                    {{$ciudad->nomb_ciu}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        </input>
                    </div>
                            <!-- /.box-body -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
